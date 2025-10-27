<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// AboutController is not used, can be removed
use App\Http\Controllers\CarController;
use App\Http\Controllers\FanPageController;

// You need to import this
use App\Http\Controllers\UserCarController;

// And this one too


// Routes handled by the PageController
Route::get('/', [PageController::class, 'welcome']);
Route::get('/contact-us', [PageController::class, 'contact']);

// This single line replaces "Route::get('/cars', ...)" and automatically
// creates named routes for index, create, store, show, edit, update, and destroy.
// We will only use index and show for now.
Route::resource('cars', CarController::class)->only(['index', 'show']);

// Authentication-related routes
Route::middleware('auth')->group(function () {
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
});

// Include the authentication routes defined in auth.php
require __DIR__ . '/auth.php';
