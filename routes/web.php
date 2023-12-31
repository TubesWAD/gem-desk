<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrganizationController;

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

Route::resource('organizations', OrganizationController::class);
//Route::resource('/departments', OrganizationController::class);