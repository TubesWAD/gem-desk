<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\IncidentTempController;


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
  
  Route::resource('/leaveTypes', LeaveTypeController::class);
  Route::patch('/leaveTypes/{leaveType}/approve', [LeaveTypeController::class, 'approve'])->name('leaveTypes.approve');

  Route::resource('/tickets',TicketController::class);
  Route::post('/tickets/{id}/createMessage', [TicketController::class, 'createMessage'])->name('tickets.createMessage');
  Route::patch('/tickets/{ticket}/close', [TicketController::class, 'close'])->name('tickets.close');
  Route::patch('/tickets/{ticket}/reopen', [TicketController::class, 'reopen'])->name('tickets.reopen');


  Route::get('/incidentTemps', [IncidentTempController::class, 'index'])->name('incidentTemps.index');
  Route::get('/incidentTemps/create', [IncidentTempController::class, 'create'])->name('incidentTemps.create');
  Route::post('/incidentTemps', [IncidentTempController::class, 'store'])->name('incidentTemps.store');
  Route::delete('/incidentTemps/{incidentTemp}', [IncidentTempController::class, 'destroy'])->name('incidentTemps.destroy');

});


