<?php

use App\Http\Controllers\ServicesController;
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
    return view('layouts.landing');
});

Route::resource('/tickets',TicketController::class);

Route::patch('/tickets/{ticket}/close', [TicketController::class, 'close'])->name('tickets.close');
Route::patch('/tickets/{ticket}/reopen', [TicketController::class, 'reopen'])->name('tickets.reopen');


// Route::get('/service/index', function () {
//     return view('ServiceCatalog/index');
// });

// Route::get('/service/index', [ServicesController::class, 'index'])->name('service.index');

// Route::get('/service/create_business', [ServicesController::class, 'create_business'])->name('service.create_business');

// Route::get('/service/create_it', [ServicesController::class, 'create_it'])->name('service.create_it');

// Route::get('/service/edit', [ServicesController::class, 'edit'])->name('service.edit');


Route::resource('services', ServicesController::class);


// Route::get('/services/{service}', 'ServiceController@show')->name('services.show');

