<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::domain(env('ADMIN_DOMAIN', 'backend.' . env('DOMAIN', false)))
    ->group(function () {
        Route::middleware('can:use-crud')->group(function () {
            Route::resource('/user', UserController::class);
        });
        require __DIR__ . '/auth.php';
        require __DIR__ . '/admin.php';
    });

Route::get('/', [SiteController::class, 'index'])->name('/');

