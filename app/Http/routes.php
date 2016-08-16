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

Route::get('app', function () {
    return view('app');
});

Route::resource('api/task', 'TaskController');

// This route is just the front-end to the actual Task application.
Route::get('taskapp', 'TaskAppController@index');

Route::get('test', 'TestController@index');
