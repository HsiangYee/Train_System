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

Route::get('/01_Module_Y', 'HomeController@index') -> name('index');


Route::get('/01_Module_Y/login', 'LoginController@index') -> name('login.index');
Route::post('/01_Module_Y/login', 'LoginController@login') -> name('login.login');
Route::get('/01_Module_Y/logout', 'LoginController@logout') -> name('login.logout');


Route::get('/01_Module_Y/admin/train', 'TrainController@index') -> name('admin.train.index');
Route::get('/01_Module_Y/admin/train/create', 'TrainController@create') -> name('admin.train.create');
Route::post('/01_Module_Y/admin/train/route', 'TrainController@route') -> name('admin.train.route');
Route::post('/01_Module_Y/admin/train/add', 'TrainController@add') -> name('admin.train.add');


Route::get('/01_Module_Y/admin/type', 'TypeController@index') -> name('admin.type.index');
Route::get('/01_Module_Y/admin/type/create', 'TypeController@create') -> name('admin.type.create');
Route::post('/01_Module_Y/admin/type/add', 'TypeController@add') -> name('admin.type.add');
Route::get('/01_Module_Y/admin/type/{id}/edit', 'TypeController@edit') -> name('admin.type.edit');
Route::patch('/01_Module_Y/admin/type/{id}', 'TypeController@update') -> name('admin.type.update');
Route::delete('/01_Module_Y/admin/type/{id}', 'TypeController@delete') -> name('admin.type.delete');


Route::get('/01_Module_Y/admin/station', 'StationController@index') -> name('admin.station.index');
Route::get('/01_Module_Y/admin/station/create', 'StationController@create') -> name('admin.station.create');
Route::post('/01_Module_Y/admin/station/add', 'StationController@add') -> name('admin.station.add');
Route::get('/01_Module_Y/admin/station/{id}/edit', 'StationController@edit') -> name('admin.station.edit');
Route::patch('/01_Module_Y/admin/station/{id}', 'StationController@update') -> name('admin.station.update');
Route::delete('/01_Module_Y/admin/station/{id}', 'StationController@delete') -> name('admin.station.delete');