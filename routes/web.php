<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
Route::middleware('web')->domain('admin.' . env('APP_DOMAIN'))->group(function () {
    
    Route::get('/', function () {
        return 'Thanh';
    });
    
    Route::prefix('config')->group(function () {
        Route::resource('config', 'ConfigController');
    });
    
    Route::prefix('schedule')->group(function () {
        Route::resource('schedule', 'ScheduleController');
    });
    
    Route::prefix('coin')->group(function () {
        Route::resource('coin', 'CoinController');
    });
    
    Route::prefix('static')->group(function () {
        Route::resource('static', 'StaticController');
    });
});

Route::middleware('auth')->domain(env('APP_DOMAIN'))->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::middleware('guest')->domain(env('APP_DOMAIN'))->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

