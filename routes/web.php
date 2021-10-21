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
Route::get('/passwords/login', 'HomeController@__construct');
Route::get('/register', 'RegisterController@showRegistrationForm');

/*POST*/
Route::get('/', 'PostController@index');

Route::get('/contents/{post}', 'PostController@show');

Route::get('/contents/{post}/edit', 'PostController@edit');
Route::put('/contents/{post}', 'PostController@update');

Route::delete('/contents/{post}', 'PostController@delete');

Route::get('/create', 'PostController@create')->middleware('auth');
Route::post('/contents', 'PostController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*USER*/
Route::get('/users/{user}', 'UserController@show')->middleware('auth');

Route::get('/users/{user}/work', 'UserController@work');

Route::get('/users/{user}/edit', 'UserController@edit')->middleware('auth');
Route::put('/users/{user}', 'UserController@update')->middleware('auth');