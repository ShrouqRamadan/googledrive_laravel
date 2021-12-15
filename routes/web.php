<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

#############
Route::get('drive', 'DriveController@index')->name('drives.index');
Route::get('drives/create', 'DriveController@create')->name('drives.create');
Route::post('drives/store', 'DriveController@store')->name('drives.store');
Route::get('drives/show/{id}', 'DriveController@show')->name('drives.show');
Route::get('drives/edit/{id}', 'DriveController@edit')->name('drives.edit');
Route::post('drives/update/{id}', 'DriveController@update')->name('drives.update');
Route::get('drives/delete/{id}', 'DriveController@destroy')->name('drives.delete');
Route::get('drives/download/{id}', 'DriveController@download')->name('drives.download');






