<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('lecturer/enquiry','LecturerController@create');
Route::post('lecturer/enquiry','LecturerController@store');

Auth::routes();
Route::get('/logout',function(){
	Auth::logout();
	return redirect('admin/login');
});

Route::get('/home', 'HomeController@index');
Route::group(array('prefix' => 'admin'), function () {
	Route::get('/',function(){
		return view('admin.index');
	});

	Route::group(array('prefix' => 'category'), function () {
		Route::get('/','CategoryController@index');
		Route::get('/create','CategoryController@create');
		Route::post('/create','CategoryController@store');
		Route::get('/{category}/edit','CategoryController@edit');
		Route::post('/{category}/edit','CategoryController@update');
		Route::get('/{category}/delete','CategoryController@delete');
	});

	Route::group(array('prefix' => 'sub-category'), function () {
		Route::get('/','SubCategoryController@index');
		Route::get('/create','SubCategoryController@create');
		Route::post('/create','SubCategoryController@store');
		Route::get('/{subcategory}/edit','SubCategoryController@edit');
		Route::post('/{subcategory}/edit','SubCategoryController@update');
		Route::get('/{subcategory}/delete','SubCategoryController@delete');
	});

	Route::group(array('prefix' => 'course'), function () {
		Route::get('/','CourseController@index');
		Route::get('/create','CourseController@create');
		Route::post('/create','CourseController@store');
		Route::get('/{course}/edit','CourseController@edit');
		Route::post('/{course}/edit','CourseController@update');
		Route::get('/{course}/delete','CourseController@delete');
	});

	Route::group(array('prefix' => 'lecturer'), function () {
		Route::get('/','LecturerController@index');
		Route::get('/create','LecturerController@create');
		Route::post('/create','LecturerController@store');
		Route::get('/{lecturer}/edit','LecturerController@edit');
		Route::post('/{lecturer}/edit','LecturerController@update');
		Route::get('/{lecturer}/delete','LecturerController@delete');
		Route::get('/{lecturer}/confirm','LecturerController@confirm');
	});

	Route::get('/table',function(){
		return view('admin.tables');
	});

	Route::get('/form',function(){
		return view('admin.forms');
	});

	Route::get('/bootstrap-element',function(){
		return view('admin.bootstrap-elements');
	});

	Route::get('/bootstrap-grid',function(){
		return view('admin.bootstrap-grid');
	});

	Route::get('/blank-page',function(){
		return view('admin.blank-page');
	});

	Route::get('/rtl',function(){
		return view('admin.index-rtl');
	});

	Route::get('/login','AuthController@admin_login');
});
