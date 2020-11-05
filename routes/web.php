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

Route::resource('plate','PlateController');
Route::resource('compPlate','CompPlateController');

Route::resource('soup','SoupController');
Route::resource('meat','MeatController');
Route::resource('principle','PrincipleController');
Route::resource('beverage','BeverageController');

Route::get('plate/destroy/{id}', 'PlateController@destroy');
Route::get('principle/destroy/{id}', 'PrincipleController@destroy');
Route::get('meat/destroy/{id}', 'MeatController@destroy');
Route::get('soup/destroy/{id}', 'SoupController@destroy');
Route::get('beverage/destroy/{id}', 'BeverageController@destroy');