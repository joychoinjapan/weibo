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




//メンバー管理
Route::resource('users','UsersController');

////ユーザーリスト
//Route::get('/users','UsersController@index')->name('users.index');
////プロフィール
//Route::get('/users/{user}','UsersController@show')->name('users.show');
////新規登録画面
//Route::get('/users/create','UsersController@create')->name('users.create');
////新規登録処理
//Route::post('/users','UsersController@store')->name('users.store');
////編集
//Route::get('/users/{user}/edit','UsersController@edit')->name('users.edit');
////更新
//Route::patch('/user/{user}','UsersController@update')->name('users.update');
////削除
//Route::delete('/users/{user}','UsersController@destory')->name('users.destroy');


//ログインログアウト処理

//ログイン画面
Route::get('login','SessionController@create')->name('login');


//ログイン処理
Route::post('login','SessionController@store')->name('login');

//ログアウト
Route::delete('login','SessionController@destroy')->name('logout');

//Eメール認証
Route::get('signup/confirm/{token}','UsersController@confirmEmail')->name('confirm_email');

//パスワードリセットフォーム
Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

//リセットメールを発送
Route::post('password/reset/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

//リセット操作
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//パスワード更新フォーム
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//weiboを発表する
Route::resource('statuses','StatusesController',['only'=>['store','destroy']]);

//フォローしている人
Route::get('/users/{user}/followings','UsersController@followings')->name('users.followings');

//フォロワー
Route::get('/users/{user}/followers','UsersController@followers')->name('users.followers');


//フォロする
Route::post('/users/followers/{user}','FollowersController@store')->name('followers.store');


//フォロの取り消し
Route::delete('/users/followers/{user}','FollowersController@destroy')->name('followers.destroy');
