<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\CartController;
use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\ColorController;
use App\Http\Controllers\api\v1\CountryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\ProductController;

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

Route::middleware('api')
    ->name('api.v1.')
    ->group(function () {
        Route::resource('/products', ProductController::class);

        Route::resource('/categories', CategoryController::class);

        Route::resource('/colors', ColorController::class);

        Route::resource('/countries', CountryController::class);

        Route::get('/get-cart-products', [CartController::class, 'getCartProducts']);

        Route::post('/add-cart', [CartController::class, 'addCart']);

        Route::get('/remove-cart/$id', [CartController::class, 'removeCart']);

        Route::post('/change-cart-product/$id', [CartController::class, 'changeCartProduct']);

        Route::post('/register', [AuthController::class, 'register']);

        Route::post('/login', [AuthController::class, 'login']);

        Route::get('/session', [AuthController::class, 'getSession']);

        Route::middleware('auth:sanctum')->group(function () {
            Route::get('/user', [AuthController::class, 'user']);
            Route::get('/logout', [AuthController::class, 'logout']);
        });
    });
