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

// 认证路由
 Route::auth();


Route::get('/', function () {
    return view('welcome');
});
Route::get('home', 'TaskController@index');
Route::resource('/task', 'TaskController');

// Route::get('/admin', 'Admin\AdminController@index');
// Route::get('admin/', 'Admin\AuthController')

//后台认证
Route::group(['middleware' => ['web'],'prefix'=>'admin', 'namespace' =>'Admin'], function () {
    //Login Routes...
    Route::get('/login','AuthController@showLoginForm');
    Route::post('/login','AuthController@login');
    Route::get('/logout','AuthController@logout');

    // Registration Routes...
    Route::get('/register', 'AuthController@showRegistrationForm');
    Route::post('/register', 'AuthController@register');

    Route::get('/', 'AdminController@index');
    Route::resource('task', 'TaskController');
    Route::resource('user', 'UserController');
});

// Route::resource('admin/task','Admin\TaskController')
