<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\DiscountController;
use App\Http\Controllers\Backend\MaterialController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SiteController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')
    ->middleware('can:use-admin-panel')
    ->group(function () {
        Route::get('/', [SiteController::class, 'index'])
            ->name('/');

        Route::get('/pages', [SiteController::class, 'pages'])
            ->name('pages');

        Route::get('/settings', [SiteController::class, 'settings'])
            ->name('settings');

        Route::resource('/user', UserController::class);

        Route::resource('/products', ProductController::class);

        Route::post('/products/add-discount', [ProductController::class, 'addDiscount']);

        Route::post('/products/add-new-discount', [ProductController::class, 'addNewDiscount']);

        Route::get('/products/enable-discount/{id}', [ProductController::class, 'enableDiscount']);

        Route::get('/products/status/{id}', [ProductController::class, 'changeStatus']);

        Route::get('/products/bestseller/{id}', [ProductController::class, 'changeBestseller']);

        Route::resource('/categories', CategoryController::class);

        Route::resource('/discounts', DiscountController::class);

        Route::post('/discount/remove-product/{id}/{productId}', [DiscountController::class, 'removeDiscountProduct']);

        Route::post('/discounts/search-products', [DiscountController::class, 'productSearch']);

        Route::resource('/colors', ColorController::class);

        Route::resource('/countries', CountryController::class);

        Route::resource('/materials', MaterialController::class);

        Route::resource('/sizes', SizeController::class);

        Route::resource('/home', SiteController::class);

        Route::post('/upload-image', [ImageController::class, 'upload']);

        Route::post('/delete-image', [ImageController::class, 'delete']);

        Route::resource('/orders', OrderController::class);

        Route::post('/orders/change-status/{id}', [OrderController::class, 'changeStatus']);
    });
