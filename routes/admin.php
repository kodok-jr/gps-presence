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

    Auth::routes(['register' => false]);

    // Route::group(['middleware' => 'larapatternauth'], function () {
    Route::group(['middleware' => ['auth:admin']], function () {

        Route::resource('/', DashboardController::class)->only(['index']);

        Route::group(['prefix' => 'management', 'as' => 'management.'], function () {
            Route::group(['prefix' => 'accounts', 'as' => 'accounts.'], function () {
                Route::resource('admin', App\Http\Controllers\Administrator\UserManagement\Accounts\AdminController::class);
                Route::resource('student', App\Http\Controllers\Administrator\UserManagement\Accounts\MemberController::class);
            });

            Route::group(['prefix' => 'access', 'as' => 'access.'], function () {
                Route::resource('roles', App\Http\Controllers\Administrator\UserManagement\ModuleAccess\RoleController::class);
                Route::resource('permissions', App\Http\Controllers\Administrator\UserManagement\ModuleAccess\PermissionController::class)->only(['update']);
            });
        });

        Route::resource('monitoring', App\Http\Controllers\Administrator\PresencesMonitoringController::class);

        Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
            Route::resource('presence', App\Http\Controllers\Administrator\Reports\PresenceController::class);
            Route::resource('recap-presence', App\Http\Controllers\Administrator\Reports\RecapPresenceController::class);
        });

        Route::resource('settings', App\Http\Controllers\Administrator\SettingController::class);
    });

});
