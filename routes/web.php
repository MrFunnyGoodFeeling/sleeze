<?php
use Illuminate\Support\Facades\Route;

Route::middleware('guest', 'throttle:60,1')->group(function()
{
    Route::get('/', [\App\Http\Controllers\WrapperController::class, 'landing'])->name('landing');
    Route::get('/register', [App\Http\Controllers\Auth\ReceptionController::class, 'create'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\ReceptionController::class, 'store']);
    Route::get('/login', [App\Http\Controllers\Auth\ReceptionController::class, 'login'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\ReceptionController::class, 'verifyLogin']);
});
Route::post('/logout', [App\Http\Controllers\Auth\ReceptionController::class, 'logout'])->middleware('auth')->name('logout');
Route::middleware('admin')->group(function()
{
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('/admin/users', [\App\Http\Controllers\AdminController::class, 'users']);
});
Route::middleware('auth', 'throttle:100,1')->group(function()
{
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'home'])->name('dashboard');
});
Route::middleware('member', 'throttle:100,1')->group(function()
{
    Route::get('/profile', [\App\Http\Controllers\DashboardController::class, 'profile'])->name('profile');
    Route::get('/settings', [\App\Http\Controllers\DashboardController::class, 'settings'])->name('settings');
});
Route::view('/restricted-area', 'operator.restricted-area')->middleware('throttle:60,1')->name('restricted-area');
