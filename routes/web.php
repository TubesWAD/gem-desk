<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function() {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

Route::middleware('auth')->group(function() {
    Route::resource('/userManagements', UserController::class);
    Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
});
