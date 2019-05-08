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
    return view('users');
});


// Views
Route::get('/', 'UserController@index')->name('user.list');
Route::get('/cadastrar', 'UserController@create')->name('user.create');
Route::get('/editar/{id}', 'UserController@edit')->name('user.edit'); //update

//APIs
Route::post('/store', 'UserController@store')->name('user.store');
Route::put('/update/{id}', 'UserController@update')->name('user.update');
Route::delete('/delete/{id}', 'UserController@delete')->name('user.delete');
