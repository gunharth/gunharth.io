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

Route::feeds();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/about', 'AboutController@index')->name('about');

Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::get('/posts/page/{page}', 'PostsController@page');
// Route::get('/posts/{year}/{slug}', 'PostsController@show')->name('posts.show')->where('slug', '(.*)');


Route::get('/music-articles', 'ArticlesController@index')->name('articles.index');
Route::get('/music-articles/{slug}', 'ArticlesController@show')->name('articles.show')->where('slug', '(.*)');

Route::get('/{slug}', 'PostsController@show')->name('posts.show')->where('slug', '(.*)');
