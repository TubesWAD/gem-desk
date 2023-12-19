<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

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

Route::resource('tickets',TicketController::class);

Route::patch('tickets/{ticket}/close', [TicketController::class, 'close'])->name('tickets.close');
Route::patch('tickets/{ticket}/reopen', [TicketController::class, 'reopen'])->name('tickets.reopen');


//Route::get('/create', [TicketController::class, 'create'])->name('tickets.create');
//Route::post('/create', [TicketController::class, 'store'])->name('tickets.create');
