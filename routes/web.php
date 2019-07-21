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
Route::get('/', function () {
    return view('blog/index');
});

Route::get('/archives', function () {
    return view('blog/archives');
});

Route::get('/comments', function () {
    return view('blog/comments');
});

// Web Routes for admin
Route::get('/admin', function () {
    return view('admin/index');
});
