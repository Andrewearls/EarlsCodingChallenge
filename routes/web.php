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

Route::middleware('auth')->group(function (){
	Route::get('/', 'ContactsController@index')->name('contacts');
	Route::post('/', 'ContactsController@persist');	
	Route::get('/import/CSV', 'CSVController@index')->name('import-csv');
	Route::post('/import/CSV', 'CSVController@persist');
});

Auth::routes();



