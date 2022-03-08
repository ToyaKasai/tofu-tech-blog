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

/** ブログ関連 */
Route::get('/', 'App\Http\Controllers\TechBlogController@index')->name('blog.top');
Route::get('/create', 'App\Http\Controllers\TechBlogController@create')->name('blog.create');
Route::post('/store', 'App\Http\Controllers\TechBlogController@store')->name('blog.store');
Route::get('/view/{id}', 'App\Http\Controllers\TechBlogController@view')->name('blog.view');
Route::get('/edit/{id}', 'App\Http\Controllers\TechBlogController@edit')->name('blog.edit');
Route::post('/update/{id}', 'App\Http\Controllers\TechBlogController@update')->name('blog.update');
