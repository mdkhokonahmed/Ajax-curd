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

Route::get('/', 'WelcomeController@index');
Route::get('/student/read-data', 'WelcomeController@readData');
Route::post('/student/store', 'WelcomeController@store');
Route::post('/Student/update', 'WelcomeController@Update');
Route::get('/Studentedit/{studentid}', 'WelcomeController@StudentEdit');
Route::get('/deletestudent/{studentid}', 'WelcomeController@Delete');

Route::get('/total-list', 'WelcomeController@totallist');

Route::get('/livesearch', 'WelcomeController@Datasearch');
Route::get('/ajax-subcategory/{studentid}', 'WelcomeController@myformAjax');


