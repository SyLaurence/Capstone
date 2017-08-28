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
    return view('login');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::group(['middleware'=>'auth'], function(){
	Route::resource('User','AdminUsersController');
	Route::resource('CompanyBrand','CompanyBrandController');
	Route::resource('Stage','StageController'); // Activity
		Route::resource('Item','ItemController');
		Route::get('Stage/Activity/{ActivitySetup}','StageController@indexItm');
		Route::get('Stage/Activity/{ActivitySetup}/create','StageController@createItm');	
		Route::resource('Criteria','CriteriaController');
		Route::get('Activity/Item/{ItemSetup}','ItemController@indexCrit');
		Route::get('Activity/Item/{ItemSetup}/create','ItemController@createCrit');
	Route::resource('Appraisal','AppraisalController');
		Route::get('Appraisal/Item/{ItemSetup}','AppraisalController@indexCrit');
	Route::resource('Recruitment','RecruitmentController');
	Route::resource('Interview','InterviewController');
	Route::resource('Evaluation','EvaluationController');
	Route::resource('PersonalInfo','PersonalInfoController');
	Route::resource('Login','LoginController');
		Route::get('logout','LoginController@logout');
	Route::resource('AllDriver','AllDriverController');
	Route::resource('HiredDriver','HiredDriverController');
	Route::resource('Designate',"DesignateController");
//});