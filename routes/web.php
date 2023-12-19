<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


// Route::get('/', function () {
//     return view('layouts.app');
// });

Route::middleware('guest')->group(function() {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});
Route::middleware('auth')->group(function() {
    Route::get('/home', function(){
        return view('UserManagement/create');
    
    });
    Route::get('/users/create', function(){
        return view('UserManagement/create');
    
    });
    
    Route::get('/users/view', function(){
        return view('UserManagement/view');
    });

    Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
});




