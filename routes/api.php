<?php

use App\Http\Controllers\Auth\AuthController;
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
});
