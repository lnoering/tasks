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

Route::get('/', 'TaskController@index');
Route::post('task/view', 'TaskController@view')->middleware('cors')->name('task.view');
Route::post('task/insert', 'TaskController@insert')->middleware('cors')->name('task.add');
Route::post('task/delete', 'TaskController@delete')->middleware('cors')->name('task.delete');
Route::post('task/update', 'TaskController@update')->middleware('cors')->name('task.update');

Route::post('state/view', 'StateController@view')->middleware('cors')->name('state.view');
Route::post('state/insert', 'StateController@insert')->middleware('cors')->name('state.insert');
Route::post('state/update', 'StateController@update')->middleware('cors')->name('state.update');
Route::post('state/delete', 'StateController@delete')->middleware('cors')->name('state.delete');
