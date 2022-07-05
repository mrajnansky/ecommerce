<?php

use App\Http\Controllers\Auth\UserTokenController;
use App\Http\Controllers\ProductModule\ProductCategoryController;
use App\Http\Controllers\ProductModule\ProductController;
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

Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('auth/tokens', UserTokenController::class);
    Route::middleware('auth:sanctum')->group(function () {
        Route::group(['prefix' => 'products'], function () {
            Route::apiResource('categories', ProductCategoryController::class);
        });
        Route::apiResource('products', ProductController::class);
    });
});
