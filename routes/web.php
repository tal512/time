<?php

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

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified', 'throttle:60,1'])->group(function () {
    Route::get('/', 'TimeController@index');
    Route::resource('projects', 'ProjectController');
    Route::resource('times', 'TimeController');
});
