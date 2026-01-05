<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Haal alle auto's op, inclusief de gegevens van de eigenaar
        $cars = Car::with('user')->latest()->get();

        return view('admin.index', compact('cars'));
    }
}
