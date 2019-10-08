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
    return view('welcome');
});

// -------------------------Admin Routes---------------------------------
Route::prefix('admin')->group(function () {
    // Employee
    Route::get('/login', 'AdminController@login')->name('admin.login');
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/index', 'AdminController@index')->name('admin.index');
    Route::get('/create', 'AdminController@create')->name('admin.create');
    Route::post('/create', 'AdminController@store')->name('admin.store');
    Route::get('/show/{id}', 'AdminController@show')->name('admin.show');
    Route::get('/edit/{id}', 'AdminController@edit')->name('admin.edit');
    Route::patch('/edit/{id}', 'AdminController@update')->name('admin.update');
    Route::delete('/delete/{id}', 'AdminController@delete')->name('admin.delete');
    // Bus
    Route::get('/busDetails', 'BusController@index')->name('bus.index');
});
