<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProjectController;

// === Public ===

// Landing Page
Route::view('/', 'landing')->name('landing');

// Halaman Eksplorasi
Route::get('/explore', [ProjectController::class, 'index'])->name('project.index');

// Detail Project
Route::get('/project/{project}', [ProjectController::class, 'show'])->name('project.show');

// === Authentication ===

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class], 'register');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// === Mahasiswa ===

Route::middleware('auth')->group(function() {

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
});

// === Admin ===

Route::middleware('auth', 'admin')->prefix('admin')->group(function() {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    // Review Project
    Route::get('/project', [AdminProjectController::class, 'index'])->name('admin.project.index');
    Route::get('/project/{project}', [AdminProjectController::class, 'show'])->name('admin.project.show');
    Route::put('/project/{project}/approve', [AdminProjectController::class, 'approve'])->name('admin.project.approve');
    Route::put('/project/{project}/reject', [AdminProjectController::class, 'reject'])->name('admin.project.reject');
});