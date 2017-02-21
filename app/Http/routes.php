<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function(){
	Route::auth();
	Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => ['web']], function () {
    //Login Routes...
    Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
    Route::post('/admin/login','AdminAuth\AuthController@login');
    Route::get('/admin/logout','AdminAuth\AuthController@logout');

    // Registration Routes...
    Route::get('admin/register', 'AdminAuth\AuthController@showRegistrationForm');
    Route::post('admin/register', 'AdminAuth\AuthController@register');

    Route::post('admin/password/email','AdminAuth\PasswordController@sendResetLinkEmail');
    Route::post('admin/password/reset','AdminAuth\PasswordController@reset');
    Route::get('admin/password/reset/{token?}','AdminAuth\PasswordController@showResetForm');

    Route::get('/admin', 'AdminController@index');

    //Rent Admin
    //Login Routes...
    Route::get('/rent/admin/login','RentAdminAuth\AuthController@showLoginForm');
    Route::post('/rent/admin/login','RentAdminAuth\AuthController@login');
    Route::get('/rent/admin/logout',['as' => 'rent_admin.logout' , 'uses' => 'RentAdminAuth\AuthController@logout']);

    // Registration Routes...
    Route::get('rent/admin/register', 'RentAdminAuth\AuthController@showRegistrationForm');
    Route::post('rent/admin/register', 'RentAdminAuth\AuthController@register');

    Route::post('rent/admin/password/email','RentAdminAuth\PasswordController@sendResetLinkEmail');
    Route::post('rent/admin/password/reset','RentAdminAuth\PasswordController@reset');
    Route::get('rent/admin/password/reset/{token?}','RentAdminAuth\PasswordController@showResetForm');

    Route::get('/rent/admin', ['as' => 'owner.home', 'uses' => 'RentAdminController@index']);
});  

Route::group(['prefix'=>'pg-location'], function() {
    
    Route::get('/add', [
        'as' => 'pg_location.add',
        'middleware' => ['rent_admin'],
        'uses' => 'PgLocationsController@create'
    ]);

    Route::post('/add', [
        'as' => 'pg_location.add_post',
        'middleware' => ['rent_admin'],
        'uses' => 'UsersController@doCreate'
    ]);
});
