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
		Route::get('Appraisal/{Appraisal}/{Applicant}/Detail','AppraisalController@detail');
		Route::get('AppraisalDetail/{Appraisal}/{Applicant}/Detail','AppraisalController@details');
		Route::get('PerfEvaluation/{id}','AppraisalController@showrecord');
		Route::get('Appraisal/limit/{obj}','OffenseController@set');
	Route::resource('Recruitment','RecruitmentController');
	Route::resource('Interview','InterviewController');
		Route::get('Interview/{ActivitySetup}/{Applicant}/Interview','InterviewController@interview');
		Route::get('Interview/{ActivitySetup}/{Applicant}/Detail','InterviewController@interviewDetail');
	Route::resource('Evaluation','EvaluationController');
		Route::get('Evaluation/{ActivitySetup}/{Applicant}/Evaluate','EvaluationController@evaluate');
		Route::get('Evaluation/{ActivitySetup}/{Applicant}/Detail','EvaluationController@detail');
	Route::resource('PersonalInfo','PersonalInfoController');
	Route::resource('Login','LoginController');
		Route::get('logout','LoginController@logout');
	Route::resource('HiredDriver','HiredDriverController');
		Route::get('DriverPool','HiredDriverController@all');
	Route::resource('Designate',"DesignateController");
	Route::resource('Attendance','AttendanceController');
		Route::get('Attendance/changebus/{CompanyBrand}','AttendanceController@changebus');
		Route::get('Attendance/record/{Attendance}','AttendanceController@showrecord');
		Route::get('Attendance/link/{type}','AttendanceController@custom');
		Route::get('Leave/{id}','AttendanceController@leaverecord');
	Route::resource('Report','ReportController');
		Route::get('Report/generate/{CompanyBrand}','ReportController@generate');
		Route::get('Report/print/{from}/{to}/{id}','ReportController@printPDF');
		Route::get('Contract/{id}','ReportController@contract');
	Route::resource('Written','WriteController');
		Route::get('Written/showEdit/{Question}','WriteController@showEdit');
		Route::get('Written/add/{add}','WriteController@add');
		Route::get('Written/up/{add}','WriteController@up');
		Route::get('Written/delete/{add}','WriteController@delete');
		Route::get('Written/ans/{add}','WriteController@ans');
		Route::get('Written/{id}/Choices','WriteController@showChoice');
		Route::get('Written/addchoice/{add}','WriteController@addchoice');
		Route::get('Written/upchoice/{add}','WriteController@upchoice');
		Route::get('Written/delchoice/{add}','WriteController@delchoice');
		Route::get('Written/exam/{id}','WriteController@exam');
		Route::get('WrittenDetail/{id}','WriteController@details');
	Route::resource('Offense','OffenseController');
		Route::get('Offense/add/{obj}','OffenseController@add');
		Route::get('Offense/del/{obj}','OffenseController@del');
		Route::get('Offense/up/{obj}','OffenseController@up');
		Route::get('Offense/limit/{obj}','OffenseController@set');
		Route::get('Offense/Record/{id}','OffenseController@offenserecord');
		Route::get('Offense/change/{Offense}','OffenseController@showrecord');
		Route::get('Offense/addrecord/{obj}','OffenseController@addrecord');
		Route::get('Feedback/{id}','OffenseController@feedbackrecord');
		Route::get('Feedback/change/{obj}','OffenseController@showrecordfeed');
		Route::get('Feedback/addrecord/{obj}','OffenseController@addrecordfeed');
//});