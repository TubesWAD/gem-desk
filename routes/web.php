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
    // Route::get('/home', function(){
    //     return view('UserManagement.view');
    
    // });
    // Route::get('/users/create', function(){
    //     return view('UserManagement/create');
    
    // });

    Route::resource('/userManagements', UserController::class);
    
    // Route::get('/create', [UserManagementController::class, 'create'])->name('create');
    // Route::post('/insert', [UserManagementController::class, 'insert'])->name('insert');

    // Route::get('/view', 'UserController@view')->name('view');

    // Route::get('/show/{id}', [UserManagementController::class, 'show'])->name('show');
    // Route::get('/edit{id}', [UserManagementController::class, 'update'])->name('edit');

    // Route::get('/delete{id}', [UserManagementController::class, 'delete'])->name('delete');

    Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
});




