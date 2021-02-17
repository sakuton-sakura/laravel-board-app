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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/board','PostController@index')->name('posts.index');//一覧

Route::get('/board/create','PostController@create')->name('posts.create');//新規作成画面

Route::post('/board/add','PostController@add')->name('posts.add');//新規作成

Route::get('/board/{id}','PostController@show')->name('posts.show');

Route::get('/board/{id}/edit','PostController@edit')->name('posts.edit');

Route::put('/board/{id}/post','PostController@update')->name('posts.update');

Route::delete('/board/{id}','PostController@delete')->name('posts.delete');
