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

//Route::get('/', function () {
//    return view('front');
//});

Route::middleware(['web', 'auth'])->name('front.')->group(function () {
    Route::get('/', 'FrontController@index')->name('index');
});

Route::middleware(['web'])->name('auth.')->prefix('auth')->group(function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('showLoginForm');
    Route::post('login', 'Auth\LoginController@login')->name('login');

    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register')->name('register');
});
