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

/*use App\CompanyBrand;

Route::get('/pages/CompanyBrand/bus','CompanyBrandController@index');

Route::get('/pages/CompanyBrand/bus-add','CompanyBrandController@create');
Route::post('pages/CompanyBrand/bus','CompanyBrandController@store');

Route::get('/pages/CompanyBrand/bus-edit/{id}','CompanyBrandController@edit');
Route::put('/pages/CompanyBrand/bus','CompanyBrandController@update');

Route::delete('/pages/CompanyBrand/bus/{id}','CompanyBrandController@destroy');*/
/*
	CompanyBrand                      - Index   - GET

	CompanyBrand/create 			  - Create  - GET
	CompanyBrand                      - Store   - POST
	
	CompanyBrand/{Company_Brand}      - Destroy - DELETE

	CompanyBrand/{Company_Brand}      - Show    - GET

	CompanyBrand/{Company_Brand}/edit - Edit    - GET
	CompanyBrand/{Company_Brand}      - Update  - PUT
	
*/

Route::get('/Activity/{Activity_Setup}/create','ActivityController@create');

Route::get('/','LoginController@index');
//Route::post('/pages/dashboard','LoginController@login');
Route::post('/','LoginController@login');


Route::resource('Company_Brand','CompanyBrandController');

/*Route::resource('PerfApp','PerfAppController');

Route::resource('LineFam','LineFamController');

Route::resource('RoadTest','RoadTestController');*/

Route::resource('Stage','StageController');

//Route::resource('Users','UserController');

Route::resource('User','AccountController');

Route::resource('Personal_Info','PersonalInfoController');

//Route::resource('Activity','ActivityController');

Route::resource('Recruitment_Setup','Recruitment_SetupController');
