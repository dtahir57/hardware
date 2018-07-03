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

Route::group(['middleware' => 'auth', 'prefix' => '/admin'], function () {
	/**
	 * Starting Routes For PermissionController
	 */
	Route::group(['middleware' => ['permission:View_Permission']], function() {
		Route::get('permissions', 'UserManagement\PermissionController@index')->name('permission.index');
	});
	Route::group(['middleware' => ['permission:Add_Permission']], function () {
		Route::get('permissions/create', 'UserManagement\PermissionController@create')->name('permission.create');
		Route::post('permissions', 'UserManagement\PermissionController@store')->name('permission.store');
	});
	Route::group(['middleware' => ['permission:Edit_Permission']], function () {
		Route::get('permissions/{id}/edit', 'UserManagement\PermissionController@edit')->name('permission.edit');
		Route::patch('permissions/{id}', 'UserManagement\PermissionController@update')->name('permission.update');
	});
	Route::group(['middleware' => ['permission:Delete_Permission']], function () {
		Route::get('permissions/destroy/{id}', 'UserManagement\PermissionController@destroy')->name('permission.destroy');
	});
	/**
	 * Ending Routes For PermissionController
	 */
	
	/**
	 * Starting Routes For RoleController
	 */
	Route::group(['middleware' => ['permission:View_Role']], function () {
		Route::get('roles', 'UserManagement\RoleController@index')->name('role.index');
	});
	Route::group(['middleware' => ['permission:Add_Role']], function () {
		Route::get('roles/create', 'UserManagement\RoleController@create')->name('role.create');
		Route::post('roles', 'UserManagement\RoleController@store')->name('role.store');
	});
	Route::group(['middleware' => ['permission:Edit_Role']], function () {
		Route::get('roles/{id}/edit', 'UserManagement\RoleController@edit')->name('role.edit');
		Route::patch('roles/{id}', 'UserManagement\RoleController@update')->name('role.update');
	});
	Route::group(['middleware' => ['permission:Delete_Role']], function () {
		Route::get('roles/destroy/{id}', 'UserManagement\RoleController@destroy')->name('role.destroy');
	});
	/**
	 * Ending Routes For RoleController
	 */
	
	/**
	 * Starting Routes For UserController
	 */
	Route::group(['middleware' => ['permission:View_User']], function () {
		Route::get('users', 'UserManagement\UserController@index')->name('user.index');
	});
	Route::group(['middleware' => ['permission:Add_User']], function () {
		Route::get('users/create', 'UserManagement\UserController@create')->name('user.create');
		Route::post('users', 'UserManagement\UserController@store')->name('user.store');
	});
	Route::group(['middleware' => ['permission:Edit_User']], function () {
		Route::get('users/{id}/edit', 'UserManagement\UserController@edit')->name('user.edit');
		Route::patch('users/{id}', 'UserManagement\UserController@update')->name('user.update');
	});
	Route::group(['middleware' => ['permission:Delete_User']], function () {
		Route::get('users/destroy/{id}', 'UserManagement\UserController@destroy')->name('user.destroy');
	});
	/**
	 * Endinf Routes For UserController
	 */
});
