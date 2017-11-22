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

	Route::get('/chart',function(){
		return view('admin.charts');
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
