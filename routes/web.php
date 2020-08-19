<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/login', 'Admin\LoginController@showloginForm')->name('admin.showlogin');
Route::post('admin/login', 'Admin\LoginController@login');
Route::prefix('/admin')->namespace('Admin')->name('admin.')->middleware('auth:admin')->group(function() {
    Route::get('/', 'IndexController@index');
    Route::resource('/columns', 'ColumnController');
    Route::get('/{category?}/articles', 'ArticleController@index')->name('article.index');
    Route::resource('/articles', 'ArticleController');
    Route::post('/upload', 'UploaderController@store')->name('upload');



    Route::post('/logout', 'LoginController@logout');
});
