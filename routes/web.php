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

Route::get('/comments', function () {
    return view('blog/comments');
});


// Web Routes for admin
Route::get('/admin', function () {
    return view('admin/index');
});

// Post
Route::resource('/admin/post', 'PostController');

// Comment
Route::get('/admin/comment', function () {
    return view('admin/comment/comment');
});

// Account
Route::get('/admin/account', function () {
    return view('admin/account/account');
});

Route::get('/admin/account/profile', function () {
    return view('admin/account/profile');
});

Route::get('/admin/account/change-password', function () {
    return view('admin/account/change-password');
});
