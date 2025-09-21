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
});
Route::middleware('throttle:100,1')->group(function()
{
    Route::view('/restricted-area', 'operator.restricted-area')->name('restricted-area');
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
    Route::get('/admin/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('admin-users');
    Route::view('/design', 'design.index')->name('design');
    Route::view('/design/dashboard', 'design.dashboard')->name('design-dashboard');
    Route::view('/design/bucket', 'design.bucket')->name('design-bucket');
    Route::view('/design/breadcrumbs', 'design.breadcrumbs')->name('design-breadcrumbs');
    Route::view('/design/modals', 'design.modals')->name('design-modals');
    Route::view('/design/tables', 'design.tables')->name('design-tables');
    
});

// Member
Route::middleware('member', 'throttle:100,1')->group(function()
{
    Route::get('/profile', [\App\Http\Controllers\DashboardController::class, 'profile'])->name('profile');
    Route::get('/settings', [\App\Http\Controllers\DashboardController::class, 'settings'])->name('settings');
});
