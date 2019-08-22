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

// Web Routes for blog
Route::get('/', 'BlogController@index');
Route::get('/archives', 'BlogController@archives');
Route::get('/post/{slug}', 'BlogController@show');
Route::get('/comments', 'BlogController@comments');
Route::get('/search', 'BlogController@search');


// Web Routes for admin
Route::get('/admin', 'AccountController@index');

// Post
Route::resource('/admin/post', 'PostController');

// Comment
Route::resource('/admin/comment', 'CommentController');

// Account
Route::get('/admin/account/logout', 'AccountController@logout');
Route::get('/admin/account/profile', 'AccountController@profile');
Route::patch('/admin/account/profile', 'AccountController@profileUpdate');

Route::get('/admin/account/change-password', 'AccountController@changePassword');
Route::patch('/admin/account/change-password', 'AccountController@changePasswordUpdate');


// Auth::routes(['register' => false]);
Auth::routes();
