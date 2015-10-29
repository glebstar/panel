<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', ['as'=>'home', 'uses' => 'HomeController@index']);

Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin', ['as'=>'admin', 'uses' => 'AdminController@index']);
    Route::get('/admin/users', ['as'=>'admin-users', 'uses' => 'AdminController@users']);
    Route::get('/admin/addop', ['as'=>'admin-addop', 'uses' => 'AdminController@addop']);
    Route::post('/admin/addopcreate', ['as'=>'admin-addop', 'uses' => 'AdminController@addopcreate']);
});


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
