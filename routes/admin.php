<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\DashboardController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

// Auth::routes();

Route::group(['namespace' => 'App\Http\Controllers\Administrator'], function () {

    // Route::group(['namespace' => 'App\Http\Controllers\Administrator'], function () { Auth::routes(['register' => false]); });
    Auth::routes(['register' => false]);

    Route::group(['middleware' => 'larapatternauth'], function () {

        Route::resource('/', DashboardController::class)->only(['index']);

    });

});
