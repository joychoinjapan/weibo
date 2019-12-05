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

//トップページ
Route::get('/','StaticPagesController@home')->name('home');
//ヘルプ
Route::get('/help','StaticPagesController@help')->name('help');
//概要
Route::get('/about','StaticPagesController@about')->name('about');


//新規登録
Route::get('signup','UserController@create')->name('signup');


//メンバー管理
//Route::resource('users','UsersController');

//ユーザーリスト
Route::get('/users','UsersController@index')->name('users.index');
//プロフィール
Route::get('/users/{user}','UsersController@show')->name('users.show');
//新規登録画面
Route::get('/users/create','UsersController@create')->name('users.create');
//新規登録処理
Route::post('/users','UsersController@store')->name('users.store');
//編集
Route::get('/users/{user}/edit','UsersController@edit')->name('users.edit');
//更新
Route::patch('/user/{user}','UsersController@update')->name('users.update');
//削除
Route::delete('/users/{user}','UsersController@destory')->name('users.destroy');
