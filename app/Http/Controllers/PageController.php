<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Importeer het User model
use Illuminate\Support\Facades\Hash;

// Importeer de Hash facade

class PageController extends Controller
{
    public function welcome(): View
    {
        return view('welcome');
    }

    public function contact(): View
    {
        // Deze view moet nog aangemaakt worden: resources/views/pages/contact.blade.php
        return view('pages.contact');
    }

    /**
     * NIEUW: Toont de 'About Us' pagina.
     */
    public function about(): View
    {
        // Deze view moet nog aangemaakt worden: resources/views/pages/about.blade.php
        return view('pages.about');
    }

    public function dashboard(): View
    {
        return view('dashboard');
    }

    public function login(): View
    {
        // Deze view moet nog aangemaakt worden: resources/views/auth/login.blade.php
        return view('auth.login');
    }

    /**
     * NIEUW: Verwerkt de inlogpoging.
     */
    public function handleLogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('cars');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * NIEUW: Maakt een testgebruiker aan.
     */
    public function createTestUser(): string
    {
        // Controleer of de gebruiker al bestaat om duplicaten te voorkomen
        $user = User::where('email', 'test@example.com')->first();

        if (!$user) {
            User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => Hash::make('password'), // Wachtwoord 'password' gehasht
            ]);
            return "Testgebruiker 'test@example.com' met wachtwoord 'password' is aangemaakt.";
        } else {
            return "Testgebruiker 'test@example.com' bestaat al.";
        }
    }

    public function adminDashboard(): View
    {
        $cars = Car::all();
        return view('admin.dashboard', compact('cars'));
    }
}
