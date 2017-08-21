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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'], function(){
	Route::resource('User','AdminUsersController');
	Route::resource('CompanyBrand','CompanyBrandController');
	Route::resource('Stage','StageController');
		Route::get('Stage/{Stage}/create','StageController@createAct');
		Route::post('Stage/{Stage}/create','StageController@storeAct');
	Route::resource('PersonalInfo','PersonalInfoController');
});