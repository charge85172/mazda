<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Belangrijk voor het ophalen van de gebruiker
use Illuminate\View\View;

// Voor de return type hint

class FanPageController extends Controller
{
    /**
     * Toon de persoonlijke autopagina van de ingelogde gebruiker.
     */
    public function show(): View
    {
        // 1. Haal de ingelogde gebruiker op.
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // 2. Haal de auto's op die bij deze gebruiker horen.
        // Dankzij de 'cars()' relatie op het User model is dit inderdaad super simpel.
        $myCars = $user->cars;

        // 3. Geef de collectie met auto's mee aan de view.
        return view('fanpage.show', [
            'myCars' => $myCars,
        ]);
    }
}
