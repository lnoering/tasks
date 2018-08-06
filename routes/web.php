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
Route::post('task/insert', 'TaskController@insert')->middleware('cors')->name('task.insert');
//Route::post('task/insert', ['middleware' => 'cors',function() {
//    return __FILE__;
//}]);
//Route::get('task/insert', ['middleware' => 'cors',function() {
//    return __FILE__;
//}]);
Route::post('task/insertAction', 'TaskController@insertAction')->middleware('cors')->name('task.add');
Route::post('task/update', 'TaskController@update')->name('task.update');

Route::get('state/insert', 'StateController@insert');
Route::post('state/insertAction', 'StateController@insertAction');
