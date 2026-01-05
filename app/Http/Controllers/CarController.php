<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Carbon\Carbon;

class CarController extends Controller
{
    public function index(Request $request)
    {
        // HAAL ALLEEN AUTO'S OP VAN DE INGELOGDE GEBRUIKER
        $user = auth()->user();
        $query = $user->cars();

        // Zoeken
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('make', 'like', "%{$search}%")
                    ->orWhere('model', 'like', "%{$search}%")
                    ->orWhere('year', 'like', "%{$search}%");
            });
        }

        // Filteren op status
        if ($status = $request->input('status')) {
            if ($status === 'active') {
                $query->where('is_active', true);
            } elseif ($status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $cars = $query->orderBy('created_at', 'desc')->paginate(10);

        // Voor filter dropdowns
        $availableYears = $user->cars()->distinct()->pluck('year')->sortDesc();
        $availableModels = $user->cars()->distinct()->pluck('model')->sort();

        return view('cars.index', compact('cars', 'availableYears', 'availableModels'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(StoreCarRequest $request)
    {
        $user = auth()->user();
        $registeredDays = Carbon::parse($user->created_at)->diffInDays(Carbon::now());

        if ($registeredDays < 3) {
            return redirect()->route('cars.index')
                ->with('error', 'Je moet minimaal 3 dagen geregistreerd zijn om auto\'s toe te voegen.');
        }

        $car = new Car($request->validated());
        $car->user_id = auth()->id();
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Auto succesvol toegevoegd!');
    }

    public function show(Car $car)
    {
        $this->authorize('view', $car);
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        $this->authorize('update', $car);
        return view('cars.edit', compact('car'));
    }

    public function update(UpdateCarRequest $request, Car $car)
    {
        $this->authorize('update', $car);
        $car->update($request->validated());

        return redirect()->route('cars.index')->with('success', 'Auto succesvol bijgewerkt!');
    }

    public function destroy(Car $car)
    {
        $this->authorize('delete', $car);
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Auto verwijderd!');
    }

    public function toggleStatus(Car $car)
    {
        $this->authorize('update', $car);
        $car->is_active = !$car->is_active;
        $car->save();

        return back()->with('success', 'Status aangepast!');
    }
}
