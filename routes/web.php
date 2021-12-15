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
//LOGIN
Route::get('/register', 'RegisterController@showRegistrationForm');

//GOOGLE LOGIN
Route::get('login/google', 'Auth\GoogleLoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\GoogleLoginController@handleGoogleCallback');


//POST
Route::get('/', 'PostController@index'); //ホーム画面

Route::get('/contents/{post}', 'PostController@show');

Route::get('/contents/{post}/edit', 'PostController@edit');
Route::put('/contents/{post}', 'PostController@update');

Route::delete('/contents/{post}', 'PostController@delete');

Route::get('/create', 'PostController@create');
Route::post('/contents', 'PostController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ABOUT
Route::get('/about', 'PostController@webAbout');

//CATEGORY
Route::get('/categories/search', 'SearchController@search'); //検索結果を表示する

Route::get('/categories/search/category', 'SearchController@category');


//USER
Route::get('/users/{user}', 'UserController@show');
Route::get('/users/{user}/edit', 'UserController@edit');
Route::put('/users/{users}', 'UserController@update');

//LIKE
Route::post('contents/{post}/like', 'LikeController@store')->name('like');
Route::post('contents/{post}/unlike', 'LikeController@destroy')->name('unlike');

//COMMENT
Route::post('/contents/{post}/comment', 'CommentController@store')->name('comment');
Route::delete('/contents/{post}/comment', 'CommentController@delete')->name('comment_delete');