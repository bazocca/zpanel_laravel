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
		Route::get('logout', 'UserController@logoutAdmin');
		Route::get('dashboard', 'DashboardController@index');

		/*
		|--------------------------------------------------------------------------
		| Route::resource
		|--------------------------------------------------------------------------
			Verb				Path					Action		Route Name
			GET					/photo					index		photo.index
			GET					/photo/create			create		photo.create
			POST				/photo					store		photo.store
			GET					/photo/{photo}			show		photo.show
			GET					/photo/{photo}/edit		edit		photo.edit
			PUT/PATCH			/photo/{photo}			update		photo.update
			DELETE				/photo/{photo}			destroy		photo.destroy
			
		Partial Resource Routes
			Route::resource('photo', 'PhotoController', ['only' => [
				'index', 'show'
			]]);

			Route::resource('photo', 'PhotoController', ['except' => [
				'create', 'store', 'update', 'destroy'
			]]);			
		*/
		
		Route::resource('user-level', 'UserLevelController');
		Route::resource('user', 'UserController');
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
		Route::get('/', 'UserController@getLoginAdmin');
		Route::post('/', 'UserController@postLoginAdmin');
	});

	/*
	|--------------------------------------------------------------------------
	| Front End Routing
	|--------------------------------------------------------------------------
	*/
	Route::get('/', 'HomeController@index');
});