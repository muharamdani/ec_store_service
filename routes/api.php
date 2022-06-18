<?php

use Illuminate\Http\Request;
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

Route::prefix('stores')
    ->controller(\App\Http\Controllers\StoreController::class)
    ->group(function () {
        Route::get('/user/{id}', 'show');
        Route::post('/', 'store');
    });
