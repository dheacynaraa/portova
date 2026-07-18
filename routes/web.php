<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\SaveController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


// =======================
// Public
// =======================

// Landing Page
Route::view('/', 'landing')->name('landing');

// Halaman Eksplorasi
Route::get('/explore', [ProjectController::class, 'index'])->name('project.index');

// Detail Project
Route::get('/project/{project}', [ProjectController::class, 'show'])->name('project.show');


// =======================
// Authentication
// =======================

Route::middleware('guest')->group(function () {

    // Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    // Register
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

});

// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// Dashboard
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});


// =======================
// Mahasiswa
// =======================

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Project
    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::put('/project/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');

    // Like
    Route::post('/like/{project}', [LikeController::class, 'store'])->name('like.store');
    Route::delete('/like/{project}', [LikeController::class, 'destroy'])->name('like.destroy');

    // Save
    Route::post('/project/{project}/save', [SaveController::class, 'store'])->name('save.store');
    Route::delete('/save/{save}', [SaveController::class, 'destroy'])->name('save.destroy');

});


// =======================
// Admin
// =======================

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Review Project
    Route::get('/project', [AdminProjectController::class, 'index'])
        ->name('admin.project.index');

    Route::get('/project/{project}', [AdminProjectController::class, 'show'])
        ->name('admin.project.show');

    Route::put('/project/{project}/approve', [AdminProjectController::class, 'approve'])
        ->name('admin.project.approve');

    Route::put('/project/{project}/reject', [AdminProjectController::class, 'reject'])
        ->name('admin.project.reject');

});