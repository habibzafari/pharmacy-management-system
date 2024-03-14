<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
});

Route::get('logout',[AuthController::class,'logout']);