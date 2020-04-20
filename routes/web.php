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
    return view('index');
});



Route::get('/trip/index' , 'TripController@index');
Route::get('/trip/jj' , 'TripController@jj');
Route::post('/trip/search' , 'TripController@search');
Route::get('/trip/create' , 'TripController@create');
Route::post('/trip/create','TripController@store');
Route::get('/trip/show','TripController@show');


Route::get('/admin/property/index' , 'PropertyController@index');
Route::get('/admin/property/create' , 'PropertyController@create');
Route::post('/admin/property/create','PropertyController@store');

