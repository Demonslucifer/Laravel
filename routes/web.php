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

//Route::get('/', function () {
//    return view('welcome');
//});

//登录与用户管理
Route::group(['namespace'=>'Admin'],function (){
    //登录显示
    Route::get('login','LoginController@index')->name('Admin.Login.index');
    //登录处理
    Route::post('login','LoginController@login')->name('Admin.Login.index');
    //用户列表显示
    Route::get('user','UserController@list')->name('Admin.index.list');
    Route::get('user/create','UserController@create')->name('Admin.index.create');
    Route::post('user/create','UserController@add')->name('Admin.index.create');
    Route::get('user/update/{id}','UserController@update')->name('Admin.index.update')->where(['id'=>'\d+']);
    Route::put('user/update/{id}','UserController@edit')->name('Admin.index.update')->where(['id'=>'\d+']);
    Route::delete('user/del/{id}','UserController@del')->name('Admin.index.del')->where(['id'=>'\d+']);
    Route::get('huishou','UserController@huishou')->name('Admin.index.huishou');
    Route::put('user/huishou/{id}','UserController@huifu')->name('Admin.index.huifu')->where(['id'=>'\d+']);
});
