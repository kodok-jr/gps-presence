<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'namespace' => 'App\Http\Controllers'], function () {

    // Route::get('/home', HomeController::class)->only(['index'])->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/home', HomeController::class)->only(['index'])->name('home');

    /** Profiles */
    Route::put('profiles/avatar/{update}', 'ProfileController@avatar')->name('profiles.avatar.update');
    Route::resource('profiles', ProfileController::class);

    /** Presences */
    Route::resource('presences', PresenceController::class);

    /** Leaderboard */
    Route::resource('leaderboards', LeaderboardController::class);

    /** Histories */
    Route::resource('histories', HistoryController::class);
});
