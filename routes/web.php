<?php

use App\Http\Controllers\CashierController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductShopController;
use App\Http\Controllers\ReceiveProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RolesController;
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
        Route::get('master/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
        Route::post('master/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
        Route::get('master/employee/{id}/show', [EmployeeController::class, 'show'])->name('employee.show');
        Route::get('master/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
        Route::post('master/employee/update', [EmployeeController::class, 'update'])->name('employee.update');
        Route::get('master/employee/{id}/delete_btn', [EmployeeController::class, 'deleteBtn'])->name('employee.delete_btn');
        Route::post('master/employee/delete', [EmployeeController::class, 'delete'])->name('employee.delete');

        // position
        Route::get('master/position', [PositionController::class, 'index'])->name('position.index');
        Route::post('master/position/store', [PositionController::class, 'store'])->name('position.store');
        Route::get('master/position/{id}/edit', [PositionController::class, 'edit'])->name('position.edit');
        Route::post('master/position/update', [PositionController::class, 'update'])->name('position.update');
        Route::get('master/position/{id}/delete_btn', [PositionController::class, 'deleteBtn'])->name('position.delete_btn');
        Route::post('master/position/delete', [PositionController::class, 'delete'])->name('position.delete');

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

        // roles
        Route::get('master/roles', [RolesController::class, 'index'])->name('roles.index');
        Route::post('master/roles/store', [RolesController::class, 'store'])->name('roles.store');
        Route::get('master/roles/{id}/edit', [RolesController::class, 'edit'])->name('roles.edit');
        Route::post('master/roles/update', [RolesController::class, 'update'])->name('roles.update');
        Route::get('master/roles/{id}/delete_btn', [RolesController::class, 'deleteBtn'])->name('roles.delete_btn');
        Route::post('master/roles/delete', [RolesController::class, 'delete'])->name('roles.delete');
        Route::get('master/roles/{id}/access', [RolesController::class, 'access'])->name('roles.access');
        Route::post('master/roles/access_save', [RolesController::class, 'accessSave'])->name('roles.access_save');

        // user
        Route::get('master/user', [UserController::class, 'index'])->name('user.index');
        Route::get('master/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('master/user/store', [UserController::class, 'store'])->name('user.store');
        Route::get('master/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::post('master/user/update', [UserController::class, 'update'])->name('user.update');
        Route::get('master/user/{id}/delete_btn', [UserController::class, 'deleteBtn'])->name('user.delete_btn');
        Route::post('master/user/delete', [UserController::class, 'delete'])->name('user.delete');
        Route::get('master/user/{id}/akses', [UserController::class, 'akses'])->name('user.akses');
        Route::put('master/user/{id}/akses_simpan', [UserController::class, 'aksesSimpan'])->name('user.akses_simpan');

        // product category
        Route::get('master/product_category', [ProductCategoryController::class, 'index'])->name('product_category.index');
        Route::post('master/product_category/store', [ProductCategoryController::class, 'store'])->name('product_category.store');
        Route::post('master/product_category/update', [ProductCategoryController::class, 'update'])->name('product_category.update');
        Route::get('master/product_category/{id}/edit', [ProductCategoryController::class, 'edit'])->name('product_category.edit');
        Route::get('master/product_category/{id}/delete_btn', [ProductCategoryController::class, 'deleteBtn'])->name('product_category.delete_btn');
        Route::post('master/product_category/delete', [ProductCategoryController::class, 'delete'])->name('product_category.delete');

        // product
        Route::get('master/product', [ProductController::class, 'index'])->name('product.index');
        Route::get('master/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('master/product/store', [ProductController::class, 'store'])->name('product.store');
        Route::post('master/product/update', [ProductController::class, 'update'])->name('product.update');
        Route::get('master/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::get('master/product/{id}/delete_btn', [ProductController::class, 'deleteBtn'])->name('product.delete_btn');
        Route::post('master/product/delete', [ProductController::class, 'delete'])->name('product.delete');

        // shop
        Route::get('master/shop', [ShopController::class, 'index'])->name('shop.index');
        Route::post('master/shop/store', [ShopController::class, 'store'])->name('shop.store');
        Route::post('master/shop/update', [ShopController::class, 'update'])->name('shop.update');
        Route::get('master/shop/{id}/edit', [ShopController::class, 'edit'])->name('shop.edit');
        Route::get('master/shop/{id}/delete_btn', [ShopController::class, 'deleteBtn'])->name('shop.delete_btn');
        Route::post('master/shop/delete', [ShopController::class, 'delete'])->name('shop.delete');


    // customer
    Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::post('customer/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::post('customer/update', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::get('customer/{id}/delete_btn', [CustomerController::class, 'deleteBtn'])->name('customer.delete_btn');
    Route::post('customer/delete', [CustomerController::class, 'delete'])->name('customer.delete');

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

    // product shop
    Route::get('product_shop', [ProductShopController::class, 'index'])->name('product_shop.index');
    Route::get('product_shop/create', [ProductShopController::class, 'create'])->name('product_shop.create');
    Route::post('product_shop/store', [ProductShopController::class, 'store'])->name('product_shop.store');
    Route::post('product_shop/update', [ProductShopController::class, 'update'])->name('product_shop.update');
    Route::get('product_shop/{id}/edit', [ProductShopController::class, 'edit'])->name('product_shop.edit');
    Route::get('product_shop/{id}/delete_btn', [ProductShopController::class, 'deleteBtn'])->name('product_shop.delete_btn');
    Route::post('product_shop/delete', [ProductShopController::class, 'delete'])->name('product_shop.delete');

    // report
    Route::get('report', [ReportController::class, 'index'])->name('report.index');
});
