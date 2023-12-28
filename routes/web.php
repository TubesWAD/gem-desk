<?php

use Illuminate\Support\Facades\Route;
<<<<<<< Updated upstream
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SolutionController;

=======
use App\Http\Controllers\LeavetypeController;
>>>>>>> Stashed changes
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
    return view('welcome');
});

Route::get('/create',[LeavetypeController::class, 'create'])->name('create');
Route::get('/insertdata',[LeavetypeController::class, 'insertdata'])->name('insertdata');

Route::get('/view',[LeavetypeController::class, 'view'])->name('view');

Route::get('/showdata/{id}',[LeavetypeController::class, 'showdata'])->name('showdata');
Route::post('/update/{id}',[LeavetypeController::class, 'update'])->name('update');

Route::get('/delete/{id}',[LeavetypeController::class, 'delete'])->name('delete');

