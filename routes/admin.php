<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('login','App\Http\Controllers\Auth\AdminAuthController@getLogin')->name('adminLogin');
Route::post('login', 'App\Http\Controllers\Auth\AdminAuthController@postLogin')->name('adminLoginPost');
Route::get('logout', 'App\Http\Controllers\Auth\AdminAuthController@logout')->name('adminLogout');

Route::group(['middleware' => 'adminauth'], function () {
	// Admin Dashboard
	Route::get('dashboard','App\Http\Controllers\AdminController@dashboard')->name('dashboard');	

	// Companies
	Route::resource('companies', 'App\Http\Controllers\CompaniesController');	

	// Employees
	Route::resource('employees', 'App\Http\Controllers\EmployeesController');
});
