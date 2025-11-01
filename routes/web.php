<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserCarController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login', [PageController::class, 'login'])->name('login');
Route::post('login', [PageController::class, 'handleLogin']);
Route::get('/create-test-user', [PageController::class, 'createTestUser']);

Route::get('/dashboard', [UserCarController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::post('/cars/update-status', [UserCarController::class, 'updateStatus'])->name('cars.updateStatus');
Route::resource('cars', UserCarController::class);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [PageController::class, 'adminDashboard'])->name('admin.dashboard');
});
