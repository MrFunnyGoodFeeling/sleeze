<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ReceptionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WrapperController;
use Illuminate\Support\Facades\Route;

// Wrapper
Route::middleware('guest', 'throttle:60,1')->group(function () {
    Route::get('/', [WrapperController::class, 'landing'])->name('landing');
    Route::get('/register', [ReceptionController::class, 'create'])->name('register');
    Route::post('/register', [ReceptionController::class, 'store']);
    Route::get('/login', [ReceptionController::class, 'login'])->name('login');
    Route::post('/login', [ReceptionController::class, 'verifyLogin']);

    // Route::view('/register', 'auth.registration-closed')->name('register');
});
Route::middleware('throttle:100,1')->group(function () {
    //
});

// Dashboard (Auth)
Route::middleware('auth', 'throttle:100,1')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard');
    Route::post('/logout', [ReceptionController::class, 'logout'])->name('logout');
});

// Admin (does not have throttle)
Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});

// Member
Route::middleware('member', 'throttle:100,1')->group(function () {
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
});
