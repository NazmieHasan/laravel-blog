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

Route::view('/', 'home');

Route::get('admin/admin-area', 'AdminController@index');

Route::get('admin/articles/all', 'AdminController@allArticles');
Route::get('admin/articles/create', 'AdminController@createArticle');
Route::post('admin/articles', 'AdminController@storeArticle');
Route::get('admin/articles/{article}', 'AdminController@showArticle');
Route::get('admin/articles/edit/{article}', 'AdminController@editArticle');
Route::patch('admin/articles/{article}', 'AdminController@updateArticle');
Route::delete('admin/articles/destroy/{article}', 'AdminController@destroyArticle');

Route::get('admin/users/all', 'AdminController@allUsers');

Route::get('articles', 'ArticlesController@all');
Route::get('articles/create', 'ArticlesController@create');
Route::post('articles', 'ArticlesController@store');
Route::get('articles/{article}', 'ArticlesController@show');
Route::get('articles/edit/{article}', 'ArticlesController@edit');
Route::patch('articles/{article}', 'ArticlesController@update');

Auth::routes();

Route::get('/home', 'HomeController@index');
