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

Route::get('/', 'PublicController@index');

Auth::routes();

Route::group(['prefix' => 'home'], function () {
  Route::get('/', 'HomeController@index')->name('home');
  Route::post('/home/user/create', 'HomeController@createUser')->name('user.create');
  Route::post('/home/user/edit/{id}', 'HomeController@editUser')->name('user.edit');
  Route::post('/home/user/delete/{id}', 'HomeController@deleteUser')->name('user.delete');
});
