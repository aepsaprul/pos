<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    // customer
    Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');

    // product
    Route::post('home/product', [HomeController::class, 'getProduct'])->name('home.product');
    Route::post('home/sales-save', [HomeController::class, 'salesSave'])->name('home.sales_save');
});
