<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\MedicinesStockController;
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

});

Route::get('logout',[AuthController::class,'logout']);