<?php

use App\Http\Controllers\api\v1\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\CartController;
use App\Http\Controllers\api\v1\ColorController;
use App\Http\Controllers\api\v1\OrderController;
use App\Http\Controllers\api\v1\CountryController;
use App\Http\Controllers\api\v1\ProductController;
use App\Http\Controllers\api\v1\CategoryController;

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

        Route::get('/blog', [PostController::class, 'index']);

        Route::resource('/categories', CategoryController::class);

        Route::resource('/colors', ColorController::class);

        Route::resource('/countries', CountryController::class);

        Route::get('/get-cart-products', [CartController::class, 'getCartProducts']);

        Route::post('/add-cart', [CartController::class, 'addCart']);

        Route::get('/remove-cart/{id}', [CartController::class, 'removeCart']);

        Route::post('/change-cart-product/{id}', [CartController::class, 'changeCartProduct']);

        Route::post('/register', [AuthController::class, 'register']);


        Route::get('/session', [AuthController::class, 'getSession']);

        Route::post('/order', [OrderController::class, 'order']);

        Route::post('/login', [AuthController::class, 'login']);

        Route::post('/logout', [AuthController::class,'logout']);

        Route::post('/refresh', [AuthController::class, 'refresh']);

        Route::post('/user', [AuthController::class,'user']);
    });
