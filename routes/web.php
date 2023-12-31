<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AssetManagementController;
use App\Http\Controllers\ProductTypeController;
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

//Routing Zaim
Route::get('/assetManagement', [AssetManagementController::class, 'index'])->name('assetManagement.index');

Route::get('/productTypes', [ProductTypeController::class, 'index'])->name('productTypes.index');
Route::get('/createproductTypes', [ProductTypeController::class, 'create'])->name('productTypes.create');
Route::post('/storeproductTypes', [ProductTypeController::class, 'store'])->name('productTypes.store');
Route::get('/showproductTypes/{id}', [ProductTypeController::class, 'show'])->name('productTypes.show');
Route::get('/editproductTypes/{id}', [ProductTypeController::class, 'edit'])->name('productTypes.edit');
Route::put('/updateproductTypes/{id}', [ProductTypeController::class, 'update'])->name('productTypes.update');
Route::get('/deleteproductTypes/{id}', [ProductTypeController::class, 'delete'])->name('productTypes.delete');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/createproducts', [ProductController::class, 'create'])->name('products.create');
Route::post('/storeproducts', [ProductController::class, 'store'])->name('products.store');
Route::get('/getProductTypesByOrganization', [ProductController::class, 'getProductTypesByOrganization'])->name('getProductTypesByOrganization');
Route::get('/showproducts/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/editproducts/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/updateproducts/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/deleteproducts/{id}', [ProductController::class, 'delete'])->name('products.delete');
//