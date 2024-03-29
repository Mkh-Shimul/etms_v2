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
    // Employees
    Route::get('/login', 'AdminController@login')->name('admin.login');
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/index', 'AdminController@index')->name('admin.index');
    Route::get('/create', 'AdminController@create')->name('admin.create');
    Route::post('/create', 'AdminController@store')->name('admin.store');
    Route::get('/show/{id}', 'AdminController@show')->name('admin.show');
    Route::get('/edit/{id}', 'AdminController@edit')->name('admin.edit');
    Route::patch('/edit/{id}', 'AdminController@update')->name('admin.update');
    Route::delete('/delete/{id}', 'AdminController@delete')->name('admin.delete');
    // Buses
    Route::get('/busDetails', 'BusController@index')->name('bus.index');
    Route::get('/bus/create', 'BusController@create')->name('bus.create');
    Route::post('/bus/create', 'BusController@store')->name('bus.store');
    Route::get('/bus/show/{id}', 'BusController@show')->name('bus.show');
    Route::get('/bus/edit/{id}', 'BusController@edit')->name('bus.edit');
    Route::patch('/bus/edit/{id}', 'BusController@update')->name('bus.update');
    Route::delete('/bus/delete/{id}', 'BusController@delete')->name('bus.delete');
    // Workers
    Route::get('/staff', 'StaffController@index')->name('staff.index');
    Route::get('/staff/create', 'StaffController@create')->name('staff.create');
    Route::post('/staff/create', 'StaffController@store')->name('staff.store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
