<?php

namespace App\Http\Controllers;

use App\Models\Car;

// New Eloquent model
use App\Models\LoginRecord;

// Import the new LoginRecord model
use Illuminate\Support\Facades\Auth;

// For getting authenticated user ID
use Illuminate\Http\Request;

// For handling requests
use Illuminate\Http\RedirectResponse;

// For redirects
use Illuminate\View\View;

// For type hinting view returns

class UserCarController extends Controller
{
    /**
     * Pas de 'auth' middleware toe op de methodes die authenticatie vereisen.
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'updateStatus']);
    }

    /**
     * Toont het dashboard met de auto's van de gebruiker.
     * Verwerkt ook zoek- en filterverzoeken.
     */
    public function index(Request $request): View
    {
        $userId = Auth::id(); // Get authenticated user ID

        $query = Car::where('user_id', $userId);

        $search = $request->input('search');
        $filter = $request->input('filter');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('make', 'like', '%' . $search . '%')
                    ->orWhere('model', 'like', '%' . $search . '%')
                    ->orWhere('year', 'like', '%' . $search . '%');
            });
        }

        if ($filter) {
            $query->where('status', $filter);
        }

        $userCars = $query->get();

        return view('dashboard', [
            'userCars' => $userCars
        ]);
    }

    /**
     * Verwerkt het updaten van de status van een auto.
     */
    public function updateStatus(Request $request): RedirectResponse
    {
        $userCarId = $request->input('user_car_id');
        $status = $request->input('status');
        $userId = Auth::id();

        // Diepere validatie: Controleer of de gebruiker op minimaal 3 verschillende dagen is ingelogd
        $uniqueLoginDays = LoginRecord::where('user_id', $userId)
            ->selectRaw('DATE(logged_in_at) as login_date')
            ->distinct()
            ->count();

        if ($uniqueLoginDays < 3) {
            return redirect()->route('cars.index')->with('error', 'Je moet op minimaal 3 verschillende dagen zijn ingelogd om de status van een auto te kunnen wijzigen.');
        }

        // Bestaande validatie
        $allowed_statuses = ['to_drive', 'driving', 'driven'];
        if (!$userCarId || !$status || !in_array($status, $allowed_statuses)) {
            return redirect()->route('cars.index')->with('error', 'Invalid update parameters.');
        }

        $car = Car::where('id', $userCarId)
            ->where('user_id', $userId)
            ->first();

        if (!$car) {
            return redirect()->route('cars.index')->with('error', 'Car not found or unauthorized.');
        }

        $car->status = $status;
        $success = $car->save();

        if ($success) {
            return redirect()->route('cars.index')->with('success', 'Car status updated successfully.');
        } else {
            return redirect()->route('cars.index')->with('error', 'Failed to update car status.');
        }
    }
}
