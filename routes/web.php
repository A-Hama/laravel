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

Route::get('/','StudentsController@index');

Route::group(['prefix' => 'students'], function(){
    Route::get('create', 'StudentsController@create');
    Route::patch('create', 'StudentsController@confirm');
    Route::post('create', 'StudentsController@store');
    Route::patch('/{id}/edit', 'StudentsController@confirm');
    Route::post('/{id}/edit', 'StudentsController@update');
});

Route::group(['prefix'=>'user'], function(){
}

Route::resource('students', 'StudentsController');

Auth::routes();

