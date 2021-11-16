<?php

use App\Http\Controllers\CashierController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceiveProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
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

    // master

        // employee
        Route::get('master/employee', [EmployeeController::class, 'index'])->name('employee.index');
        Route::post('master/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
        Route::get('master/employee/{id}/show', [EmployeeController::class, 'show'])->name('employee.show');
        Route::get('master/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
        Route::post('master/employee/update', [EmployeeController::class, 'update'])->name('employee.update');
        Route::get('master/employee/{id}/delete_btn', [EmployeeController::class, 'deleteBtn'])->name('employee.delete_btn');
        Route::post('master/employee/delete', [EmployeeController::class, 'delete'])->name('employee.delete');

        // navigasi
        Route::get('master/nav', [NavController::class, 'index'])->name('nav.index');

            // navigasi main
            Route::post('master/nav/main_store', [NavController::class, 'mainStore'])->name('nav.main_store');
            Route::get('master/nav/{id}/main_edit', [NavController::class, 'mainEdit'])->name('nav.main_edit');
            Route::post('master/nav/main_update', [NavController::class, 'mainUpdate'])->name('nav.main_update');
            Route::get('master/nav/{id}/main_delete_btn', [NavController::class, 'mainDeleteBtn'])->name('nav.main_delete_btn');
            Route::post('master/nav/main_delete', [NavController::class, 'mainDelete'])->name('nav.main_delete');

            // navigasi sub
            Route::get('master/nav/sub_create', [NavController::class, 'subCreate'])->name('nav.sub_create');
            Route::post('master/nav/sub_store', [NavController::class, 'subStore'])->name('nav.sub_store');
            Route::get('master/nav/{id}/sub_edit', [NavController::class, 'subEdit'])->name('nav.sub_edit');
            Route::post('master/nav/sub_update', [NavController::class, 'subUpdate'])->name('nav.sub_update');
            Route::get('master/nav/{id}/sub_delete_btn', [NavController::class, 'subDeleteBtn'])->name('nav.sub_delete_btn');
            Route::post('master/nav/sub_delete', [NavController::class, 'subDelete'])->name('nav.sub_delete');

        // user
        Route::get('master/user', [UserController::class, 'index'])->name('user.index');
        Route::post('master/user/store', [UserController::class, 'store'])->name('user.store');
        Route::get('master/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::post('master/user/update', [UserController::class, 'update'])->name('user.update');
        Route::get('master/user/{id}/delete_btn', [UserController::class, 'deleteBtn'])->name('user.delete_btn');
        Route::post('master/user/delete', [UserController::class, 'delete'])->name('user.delete');
        Route::get('master/user/{id}/akses', [UserController::class, 'akses'])->name('user.akses');
        Route::put('master/user/{id}/akses_simpan', [UserController::class, 'aksesSimpan'])->name('user.akses_simpan');

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
        // cash
        Route::get('cashier', [CashierController::class, 'index'])->name('cashier.index');
        Route::post('cashier/product', [CashierController::class, 'getProduct'])->name('cashier.product');
        Route::post('cashier/sales-save', [CashierController::class, 'salesSave'])->name('cashier.sales_save');
        Route::post('cashier/print', [CashierController::class, 'print'])->name('cashier.print');
        Route::delete('cashier/{id}/delete', [CashierController::class, 'delete'])->name('cashier.delete');

        // credit
        Route::get('cashier/credit', [CashierController::class, 'credit'])->name('cashier.credit');

    // transaction
        // sales
        Route::get('transaction/sales', [SalesController::class, 'index'])->name('sales.index');
        Route::get('transaction/sales/{id}/show', [SalesController::class, 'show'])->name('sales.show');
        Route::get('transaction/sales/{id}/delete_btn', [SalesController::class, 'deleteBtn'])->name('sales.delete_btn');
        Route::post('transaction/sales/delete', [SalesController::class, 'delete'])->name('sales.delete');

        // receive product
        Route::get('transaction/received_product', [ReceiveProductController::class, 'index'])->name('received_product.index');
        Route::get('transaction/received_product/create', [ReceiveProductController::class, 'create'])->name('received_product.create');
        Route::post('transaction/received_product/store', [ReceiveProductController::class, 'store'])->name('received_product.store');
        Route::post('transaction/received_product/update', [ReceiveProductController::class, 'update'])->name('received_product.update');
        Route::get('transaction/received_product/{id}/edit', [ReceiveProductController::class, 'edit'])->name('received_product.edit');
        Route::get('transaction/received_product/{id}/delete_btn', [ReceiveProductController::class, 'deleteBtn'])->name('received_product.delete_btn');
        Route::post('transaction/received_product/delete', [ReceiveProductController::class, 'delete'])->name('received_product.delete');

    // shop
    Route::get('shop', [ShopController::class, 'index'])->name('shop.index');
    Route::post('shop/store', [ShopController::class, 'store'])->name('shop.store');
    Route::post('shop/update', [ShopController::class, 'update'])->name('shop.update');
    Route::get('shop/{id}/edit', [ShopController::class, 'edit'])->name('shop.edit');
    Route::get('shop/{id}/delete_btn', [ShopController::class, 'deleteBtn'])->name('shop.delete_btn');
    Route::post('shop/delete', [ShopController::class, 'delete'])->name('shop.delete');

    // report
    Route::get('report', [ReportController::class, 'index'])->name('report.index');
});
