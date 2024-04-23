<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\MedicinesStockController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WebsiteLogoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[AuthController::class,'login']);
Route::get('/forgot',[AuthController::class,'forgot']);
Route::post('forgot_post',[AuthController::class,'forgot_post']);
Route::post('/login_post',[AuthController::class,'login_post']); 
Route::get('reset/{token}',[AuthController::class,'getReset']);   
Route::post('reset/{token}',[AuthController::class,'postReset']);   
Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard',[DashboardController::class,'dashboard']);

    Route::get('admin/customers',[CustomersController::class,'customers']);
    Route::get('admin/customers/add',[CustomersController::class,'add_customers']);
    Route::post('admin/customers/add',[CustomersController::class,'insert_add_customers']);
    Route::get('admin/customers/edit/{id}',[CustomersController::class,'edit_customers']);
    Route::post('admin/customers/edit/{id}',[CustomersController::class,'update_customers']);
    Route::get('admin/customers/delete/{id}',[CustomersController::class,'delete_customers']);

    //admin/medicines

    Route::get('admin/medicines',[MedicinesController::class,'medicines']);
    Route::get('admin/medicines/add',[MedicinesController::class,'add_medicines']);
    Route::post('admin/medicines/add',[MedicinesController::class,'insert_add_medicines']);
    Route::get('admin/medicines/edit/{id}',[MedicinesController::class,'edit_medicines']);
    Route::post('admin/medicines/edit/{id}',[MedicinesController::class,'update_medicines']);
    Route::get('admin/medicines/delete/{id}',[MedicinesController::class,'delete_medicines']);

    //admin/medicines_stock

    Route::get('admin/medicines_stock',[MedicinesStockController::class,'medicines_stock']);
    Route::get('admin/medicines_stock/add',[MedicinesStockController::class,'add_medicines_stock']);
    Route::post('admin/medicines_stock/add',[MedicinesStockController::class,'insert_add_medicines_stock']);
    Route::get('admin/medicines_stock/edit/{id}',[MedicinesStockController::class,'edit_medicines_stock']);
    Route::post('admin/medicines_stock/edit/{id}',[MedicinesStockController::class,'update_medicines_stock']);
    Route::get('admin/medicines_stock/delete/{id}',[MedicinesStockController::class,'delete_medicines_stock']);

    //admin/supplier

    Route::get('admin/supplier',[SupplierController::class,'supplier']);
    Route::get('admin/supplier/add',[SupplierController::class,'add_supplier']);
    Route::post('admin/supplier/add',[SupplierController::class,'insert_supplier']);
    Route::get('admin/supplier/edit/{id}',[SupplierController::class,'edit_supplier']);
    Route::post('admin/supplier/edit/{id}',[SupplierController::class,'update_supplier']);
    Route::get('admin/supplier/delete/{id}',[SupplierController::class,'delete_supplier']);

    // admin/invoices

    Route::get('admin/invoices',[InvoicesController::class,'invoices']);
    Route::get('admin/invoices/add',[InvoicesController::class,'add_invoices']);
    Route::post('admin/invoices/add',[InvoicesController::class,'insert_add_invoices']);
    Route::get('admin/invoices/edit/{id}',[InvoicesController::class,'edit_invoices']);
    Route::post('admin/invoices/edit/{id}',[InvoicesController::class,'update_invoices']);
    Route::get('admin/invoices/delete/{id}',[InvoicesController::class,'delete_invoices']);


    // admin/purchases

    Route::get('admin/purchases',[PurchasesController::class,'purchases']);
    Route::get('admin/purchases/add',[PurchasesController::class,'add_purchases']);
    Route::post('admin/purchases/add',[PurchasesController::class,'insert_add_purchases']);
    Route::get('admin/purchases/edit/{id}',[PurchasesController::class,'edit_purchases']);
    Route::post('admin/purchases/edit/{id}',[PurchasesController::class,'update_purchases']);
    Route::get('admin/purchases/delete/{id}',[PurchasesController::class,'delete_purchases']);

    // admin/my_account

    Route::get('admin/my_account',[DashboardController::class,'my_account']);
    Route::post('admin/my_account',[DashboardController::class,'update_my_account']);

    // website_logo
    Route::get('admin/website_logo',[WebsiteLogoController::class,'website_logo']);
    Route::post('admin/website_logo_update',[WebsiteLogoController::class,'website_logo_update']);

});

Route::get('logout',[AuthController::class,'logout']);