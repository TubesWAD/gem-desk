<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\IncidentTempController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('/tickets',TicketController::class);
Route::post('/tickets/{id}/createMessage', [TicketController::class, 'createMessage'])->name('tickets.createMessage');
Route::patch('/tickets/{ticket}/close', [TicketController::class, 'close'])->name('tickets.close');
Route::patch('/tickets/{ticket}/reopen', [TicketController::class, 'reopen'])->name('tickets.reopen');


Route::get('/incidentTemps', [IncidentTempController::class, 'index'])->name('incidentTemps.index');
Route::get('/incidentTemps/create', [IncidentTempController::class, 'create'])->name('incidentTemps.create');
Route::post('/incidentTemps', [IncidentTempController::class, 'store'])->name('incidentTemps.store');
Route::delete('/incidentTemps/{incidentTemp}', [IncidentTempController::class, 'destroy'])->name('incidentTemps.destroy');




