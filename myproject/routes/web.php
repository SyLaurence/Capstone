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

use App\CompanyBrand;

/*Route::get('/pages/CompanyBrand/bus','CompanyBrandController@index');

Route::get('/pages/CompanyBrand/bus-add','CompanyBrandController@create');
Route::post('pages/CompanyBrand/bus','CompanyBrandController@store');

Route::get('/pages/CompanyBrand/bus-edit/{id}','CompanyBrandController@edit');
Route::put('/pages/CompanyBrand/bus','CompanyBrandController@update');

Route::delete('/pages/CompanyBrand/bus/{id}','CompanyBrandController@destroy');*/

Route::resource('CompanyBrand','CompanyBrandController');

Route::resource('PerfApp','PerfAppController');

Route::resource('LineFam','LineFamController');

Route::resource('RoadTest','RoadTestController');

Route::resource('Stage','StageController');

Route::resource('Users','UserController');

Route::resource('Activity','ActivityController');