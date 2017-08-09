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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {

    Route::get('/', 'HomeController@index');

    Route::resource('users', 'UserController');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');

    Route::prefix('settings')->group(function () {
        Route::get('general', 'SettingController@general')->name('settings.index');

        Route::post('save', 'SettingController@save')->name('settings.save');
    });
});

Route::get('/', 'PublicController@index')->name('index');
