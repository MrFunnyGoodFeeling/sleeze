<?php

use Illuminate\Support\Facades\Route;

// Sleeze
Route::get('/', [\App\Http\Controllers\WrapperController::class, 'landing'])->name('landing');

Route::get('/register', [App\Http\Controllers\Auth\ReceptionController::class, 'create'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\ReceptionController::class, 'store']);
Route::get('/login', [App\Http\Controllers\Auth\ReceptionController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\ReceptionController::class, 'verifyLogin']);
Route::post('/logout', [App\Http\Controllers\Auth\ReceptionController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->middleware(['admin'])->name('admin');
Route::get('/admin/users', [\App\Http\Controllers\AdminController::class, 'users'])->middleware(['admin']);

Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profile'])->middleware(['auth'])->name('profile');
Route::get('/settings', [\App\Http\Controllers\UserController::class, 'settings'])->middleware(['auth'])->name('settings');

Route::view('/design', 'design.index')->middleware(['admin']);
Route::view('/design/forms', 'design.forms')->middleware(['admin']);
Route::view('/design/modals', 'design.modals')->middleware(['admin']);
Route::view('/design/test', 'design.test')->middleware(['admin']);

Route::view('/restricted-area', 'operator.restricted-area');
