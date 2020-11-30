<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Seller\SellerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('signup', [AuthController::class, 'signUp']);
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('logout', [AuthController::class, 'logout'])
        ->middleware('auth:api');

    #End Point Productos
    Route::post('products/{id}/buy', [ProductController::class,'Buy'])->middleware('auth:api');
    Route::apiResource('products',ProductController::class)->only('index','Show')->middleware('auth:api');

    #endpoint compradores
    Route::apiResource('buyers',BuyerController::class)->only('index','show')->middleware('auth:api');
    
    #endpoint vendedores
    Route::post('sellers/product', [SellerController::class,'AddProduct'])->middleware('auth:api');
    Route::apiResource('sellers', SellerController::class)->only('index', 'show')->middleware('auth:api');
});
