<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\FanPageController;
use App\Http\Controllers\UserCarController;


// Routes handled by the PageController
Route::get('/', [PageController::class, 'welcome']);
// Geef de contact-us route een naam
Route::get('/contact-us', [PageController::class, 'contact'])->name('contact');
// NIEUW: Route voor de About pagina
Route::get('/about', [PageController::class, 'about'])->name('about');

// Car resource routes (index, show, create, store, etc.)
Route::resource('cars', CarController::class)->only(['index', 'show']);

// Authentication-related routes
Route::middleware('auth')->group(function () {
    // De dashboard route is nu minder prominent, omdat cars.index de 'Home' is
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Personal fan page
    Route::get('/mijn-pagina', [FanPageController::class, 'show'])->name('fanpage.show');

    // Routes for managing a user's garage
    Route::post('/my-garage/cars/{car}', [UserCarController::class, 'store'])->name('garage.store');
    Route::patch('/my-garage/cars/{car}', [UserCarController::class, 'update'])->name('garage.update');
    Route::delete('/my-garage/cars/{car}', [UserCarController::class, 'destroy'])->name('garage.destroy');
    // in routes/web.php

    // Admin-only routes
    Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
        // Voorbeeld: een admin dashboard
        Route::get('/dashboard', function () {
            return 'Welkom op het Admin Dashboard!'; // Tijdelijke view
        })->name('dashboard');
    });

    require __DIR__ . '/auth.php';;
