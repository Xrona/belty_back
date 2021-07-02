<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\SiteController;
use App\Http\Controllers\Backend\ProductController;
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
    });
