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
