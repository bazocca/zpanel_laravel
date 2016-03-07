<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
	Route::get('/', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'admin'], function () {
	/*
	|--------------------------------------------------------------------------
	| Admin Routing
	|--------------------------------------------------------------------------
	|
	| namespace = Admin ; app/Http/Controller/Admin
	| prefix = zpanel; localhost/root/zpanel
	|
	*/
	Route::group(array('namespace' => 'Admin', 'prefix' => 'zpanel'), function() {
		Route::get('/', 'UserController@getLogin');
		Route::post('/', 'UserController@postLogin');
		Route::get('logout', 'UserController@logout');
		Route::get('dashboard', 'DashboardController@index');
		
	});
});

Route::group(['middleware' => 'web'], function () {
	/*
	|--------------------------------------------------------------------------
	| Admin Routing
	|--------------------------------------------------------------------------
	|
	| namespace = Admin ; app/Http/Controller/Admin
	| prefix = zpanel; localhost/root/zpanel
	|
	*/
	Route::group(array('namespace' => 'Admin', 'prefix' => 'zpanel'), function() {
		Route::get('/', 'UserController@getLogin');
		Route::post('/', 'UserController@postLogin');
	});
});