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

// Route::get('/', function () {
//    return view('welcome');
// });
Route::get('test', function(){
    return "test";
});

Auth::routes(['verify' => true]);

Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('login');;
});

Route::group(['prefix' => 'projects', 'middleware' => 'auth'], function () {
    Route::get('/createProject', 'ProjectsController@createProject');

    Route::get('/{id}', 'ProjectsController@open');
    Route::get('/', 'ProjectsController@index');
});
