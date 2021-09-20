<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // product category
    Route::get('produk_category', [ProductCategoryController::class, 'index'])->name('produk_category.index');
    Route::get('produk_category/create', [ProductCategoryController::class, 'create'])->name('produk_category.create');
    Route::post('produk_category/store', [ProductCategoryController::class, 'store'])->name('produk_category.store');
});
