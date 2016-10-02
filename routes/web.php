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
Route::get('news/posted', 'NewsController@posted')->name('news_posted');
Route::get('news/post', 'NewsController@post');
Route::post('news', 'NewsController@store');
Route::get('news/{news}', 'NewsController@show');
Route::patch('news/{news}', 'NewsController@update');
Route::get('news/{news}/edit', 'NewsController@edit');

Auth::routes();
