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
// Public Routes
// =======================

// Landing Page
Route::view('/', 'landing')->name('landing');

// Halaman Eksplorasi
Route::get('/explore', [ProjectController::class, 'index'])->name('project.index');

// Detail Project
Route::get('/project/{project}', [ProjectController::class, 'show'])->name('project.show');

// =======================
// Authentication Routes
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
// Dashboard Redirect Berdasarkan Role
// =======================

Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    // Mahasiswa atau role lain
    return redirect()->route('project.index'); // /explore
})->middleware('auth')->name('dashboard');

// =======================
// Mahasiswa Routes (Authenticated)
// =======================

Route::middleware('auth')->group(function () {

    Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
    Route::put('/profile',[ProfileController::class,'update'])->name('profile.update');

    // CRUD PROJECT
    Route::get('/project/create',[ProjectController::class,'create'])->name('project.create');

    Route::post('/project',[ProjectController::class,'store'])->name('project.store');

    Route::get('/project/{project}/edit',[ProjectController::class,'edit'])->name('project.edit');

    Route::put('/project/{project}',[ProjectController::class,'update'])->name('project.update');

    Route::delete('/project/{project}',[ProjectController::class,'destroy'])->name('project.destroy');

    // Bookmark
    Route::get('/save',[SaveController::class,'index'])->name('save.index');
    Route::post('/project/{project}/save',[SaveController::class,'store'])->name('save.store');
    Route::delete('/save/{save}',[SaveController::class,'destroy'])->name('save.destroy');

    // Like
    Route::post('/like/{project}',[LikeController::class,'store'])->name('like.store');
    Route::delete('/like/{project}',[LikeController::class,'destroy'])->name('like.destroy');

});

// =======================
// Admin Routes (Authenticated + Admin Middleware)
// =======================

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/antrean', [AdminProjectController::class, 'antrean'])->name('antrean');

    Route::prefix('project')->name('project.')->group(function () {
        Route::get('/', [AdminProjectController::class, 'index'])->name('index');
        Route::get('/{project}', [AdminProjectController::class, 'show'])->name('show');
        
        // 🔥 PERBAIKAN: ubah dari PUT menjadi POST agar sesuai dengan form di view
        Route::post('/{project}/approve', [AdminProjectController::class, 'approve'])->name('approve');
        Route::post('/{project}/reject', [AdminProjectController::class, 'reject'])->name('reject');
    });
});