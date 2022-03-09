<?php declare(strict_types=1);

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
Route::get('/', 'App\Http\Controllers\ArticleController@index')->name('blog.top');
Route::get('/create', 'App\Http\Controllers\ArticleController@create')->name('blog.create');
Route::post('/store', 'App\Http\Controllers\ArticleController@store')->name('blog.store');
Route::get('/view/{id}', 'App\Http\Controllers\ArticleController@view')->name('blog.view');
Route::get('/edit/{id}', 'App\Http\Controllers\ArticleController@edit')->name('blog.edit');
Route::post('/update/{id}', 'App\Http\Controllers\ArticleController@update')->name('blog.update');
Route::post('/delete/{id}', 'App\Http\Controllers\ArticleController@delete')->name('blog.delete');

/** お気に入り */
Route::post('/favorite/{id}', 'App\Http\Controllers\FavoriteController@updateFavorite')->name('favorite.update');
