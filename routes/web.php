<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('news/posted', 'NewsController@posted')->name('news_posted')->middleware('auth');
Route::get('news/post', 'NewsController@post')->middleware('auth');
Route::post('news', 'NewsController@store')->middleware('auth');
Route::get('news/{news}', 'NewsController@show');
Route::get('news/{news}/remove', 'NewsController@destroy');

/*
 * Disabled news article editing functionality.
 *
 * Route::patch('news/{news}', 'NewsController@update')->middleware('auth');
 * Route::get('news/{news}/edit', 'NewsController@edit')->middleware('auth');
 */

Route::get('news/{news}/export', 'NewsController@export');
Route::get('verify/{token}', 'Auth\RegisterController@verify');
Route::post('verify/{token}', 'Auth\RegisterController@createPassword');

Auth::routes();
Route::feeds();