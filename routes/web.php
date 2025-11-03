<?php

use App\Http\Controllers\AdminController;

// TOEGEVOEGD
use App\Http\Controllers\CarController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $userCars = Auth::user()->cars()->latest()->get();
    return view('dashboard', ['userCars' => $userCars]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Catalog route
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

    // Contact route
    Route::get('/contact', function () {
        return 'This is the contact page.';
    })->name('contact');

    // Car routes
    Route::resource('cars', CarController::class)->middleware('verified');
    Route::patch('cars/{car}/toggle-status', [CarController::class, 'toggleStatus'])->name('cars.toggleStatus');

    // Admin routes (AANGEPAST)
    Route::get('/admin', [AdminController::class, 'index'])->middleware('admin')->name('admin.index');
});

require __DIR__ . '/auth.php';
