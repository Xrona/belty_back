<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\SiteController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\MaterialController;
use App\Http\Controllers\Backend\SizeController;
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

        Route::resource('/categories', CategoryController::class);

        Route::resource('/colors', ColorController::class);

        Route::resource('/countries', CountryController::class);

        Route::resource('/materials', MaterialController::class);

        Route::resource('/sizes', SizeController::class);
    });
