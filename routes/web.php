<?php

use App\Http\Controllers\CashierController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
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
    // ubah password
    Route::get('change-password', [ChangePasswordController::class, 'index'])->name('change.password.index');
    Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');

    // customer
    Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::post('customer/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::post('customer/update', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::get('customer/{id}/delete_btn', [CustomerController::class, 'deleteBtn'])->name('customer.delete_btn');
    Route::post('customer/delete', [CustomerController::class, 'delete'])->name('customer.delete');

    // product category
    Route::get('product_category', [ProductCategoryController::class, 'index'])->name('product_category.index');
    Route::post('product_category/store', [ProductCategoryController::class, 'store'])->name('product_category.store');
    Route::post('product_category/update', [ProductCategoryController::class, 'update'])->name('product_category.update');
    Route::get('product_category/{id}/edit', [ProductCategoryController::class, 'edit'])->name('product_category.edit');
    Route::get('product_category/{id}/delete_btn', [ProductCategoryController::class, 'deleteBtn'])->name('product_category.delete_btn');
    Route::post('product_category/delete', [ProductCategoryController::class, 'delete'])->name('product_category.delete');

    // product
    Route::get('product', [ProductController::class, 'index'])->name('product.index');
    Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::post('product/update', [ProductController::class, 'update'])->name('product.update');
    Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('product/{id}/delete_btn', [ProductController::class, 'deleteBtn'])->name('product.delete_btn');
    Route::post('product/delete', [ProductController::class, 'delete'])->name('product.delete');

    // home
    Route::post('home/product', [HomeController::class, 'getProduct'])->name('home.product');
    Route::post('home/sales-save', [HomeController::class, 'salesSave'])->name('home.sales_save');

    // supplier
    Route::get('supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::post('supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
    Route::post('supplier/update', [SupplierController::class, 'update'])->name('supplier.update');
    Route::get('supplier/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::get('supplier/{id}/delete_btn', [SupplierController::class, 'deleteBtn'])->name('supplier.delete_btn');
    Route::post('supplier/delete', [SupplierController::class, 'delete'])->name('supplier.delete');

    // cashier
    Route::get('cashier', [CashierController::class, 'index'])->name('cashier.index');
    Route::post('cashier/product', [CashierController::class, 'getProduct'])->name('cashier.product');
    Route::post('cashier/sales-save', [CashierController::class, 'salesSave'])->name('cashier.sales_save');
});
