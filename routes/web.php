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



Route::get('uploadImage', 'ImageUploadController@index');
Route::post('upload/store', 'ImageUploadController@store');
Route::post('delete', 'ImageUploadController@delete');



Route::get('/trip/index' , 'TripController@index');
Route::post('/trip/search' , 'TripController@search');
Route::get('/trip/create' , 'TripController@create')->middleware('auth');
Route::post('/trip/create','TripController@store')->middleware('auth');
Route::get('/trip/show','TripController@show');


Route::get('/admin/property/index' , 'PropertyController@index')->middleware('auth');
Route::get('/admin/property/create' , 'PropertyController@create')->middleware('auth');
Route::post('/admin/property/create','PropertyController@store')->middleware('auth');


Auth::routes();


Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


