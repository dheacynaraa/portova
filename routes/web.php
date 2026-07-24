<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProjectController;

// =======================
// HALAMAN STATIS
// =======================
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::view('/', 'landing')->name('landing');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// =======================
// AUTHENTICATION ROUTES
// =======================
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// =======================
// PUBLIC ROUTES
// =======================

Route::get('/explore', [ProjectController::class, 'index'])->name('explore');
Route::get('/project/{project}', [ProjectController::class, 'show'])->name('project.show');

// =======================
// MAHASISWA ROUTES (Auth)
// =======================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/project/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');

    Route::get('/save', [SaveController::class, 'index'])->name('save.index');
    Route::post('/project/{project}/save', [SaveController::class, 'store'])->name('save.store');
    Route::delete('/save/{save}', [SaveController::class, 'destroy'])->name('save.destroy');

    Route::post('/like/{project}', [LikeController::class, 'store'])->name('like.store');
    Route::delete('/like/{project}', [LikeController::class, 'destroy'])->name('like.destroy');
});

// =======================
// ADMIN ROUTES
// =======================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/antrean', [AdminProjectController::class, 'antrean'])->name('antrean');

    Route::prefix('project')->name('project.')->group(function () {
        Route::get('/', [AdminProjectController::class, 'index'])->name('index');
        Route::get('/{project}', [AdminProjectController::class, 'show'])->name('show');
        Route::post('/{project}/approve', [AdminProjectController::class, 'approve'])->name('approve');
        Route::post('/{project}/reject', [AdminProjectController::class, 'reject'])->name('reject');
    });
});