<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 HALAMAN AWAL
Route::get('/', function () {
    return view('welcome');
});


// 🔁 REDIRECT DASHBOARD SESUAI ROLE
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {

    $role = auth()->user()->role;

    return match ($role) {
        'admin' => redirect()->route('admin.dashboard'),
        'manager' => redirect()->route('manager.dashboard'),
        'developer' => redirect()->route('developer.dashboard'),
        default => redirect('/')
    };

})->name('dashboard');


// ================= ADMIN =================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'admin'])
        ->name('dashboard');

    // USER MANAGEMENT
    Route::resource('users', UserController::class);
});


// ================= MANAGER =================
Route::middleware(['auth', 'role:manager'])
    ->prefix('manager')
    ->name('manager.')
    ->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'manager'])
        ->name('dashboard');

    // 🔥 PROJECT MANAGEMENT (DITAMBAHKAN)
    Route::resource('projects', ProjectController::class);
});


// ================= DEVELOPER =================
Route::middleware(['auth', 'role:developer'])
    ->prefix('developer')
    ->name('developer.')
    ->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'developer'])
        ->name('dashboard');

    // PROJECT (READ ONLY / OPTIONAL)
    Route::resource('projects', ProjectController::class);

    // TASK
    Route::resource('tasks', TaskController::class);

    // UPDATE STATUS TASK
    Route::post('/tasks/{id}/{status}', [TaskController::class, 'updateStatus'])
        ->name('tasks.updateStatus');
});


// ================= PROFILE =================
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


// 🔐 AUTH LARAVEL
require __DIR__.'/auth.php';
