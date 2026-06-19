<?php
use Illuminate\Support\Facades\Route;

// Wrapper
Route::middleware('guest', 'throttle:60,1')->group(function()
{
    Route::get('/', [\App\Http\Controllers\WrapperController::class, 'landing'])->name('landing');
    Route::get('/register', [App\Http\Controllers\Auth\ReceptionController::class, 'create'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\ReceptionController::class, 'store']);
    Route::get('/login', [App\Http\Controllers\Auth\ReceptionController::class, 'login'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\ReceptionController::class, 'verifyLogin']);

    // Route::view('/register', 'auth.registration-closed')->name('register');
});
Route::middleware('throttle:100,1')->group(function()
{
    //
});

// Dashboard (Auth)
Route::middleware('auth', 'throttle:100,1')->group(function()
{
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'home'])->name('dashboard');
    Route::post('/logout', [App\Http\Controllers\Auth\ReceptionController::class, 'logout'])->name('logout');
});

// Admin (does not have throttle)
Route::middleware('admin')->group(function()
{
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
});

// Member
Route::middleware('member', 'throttle:100,1')->group(function()
{
    Route::get('/profile', [\App\Http\Controllers\DashboardController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [\App\Http\Controllers\DashboardController::class, 'editProfile'])->name('edit-profile');
Route::get('/settings', [\App\Http\Controllers\DashboardController::class, 'settings'])->name('settings');
});
