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

Auth::routes(['verify' => true]);

Route::get('test', function () {

});

Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('login');;
});

Route::group(['prefix' => 'projects', 'middleware' => ['web', 'auth', 'verified']], function () {
    Route::get('/', 'ProjectsController@index');
    Route::get('getProjects', 'ProjectsController@getProjects');
    Route::post('createOrUpdateProeject', 'ProjectsController@createOrUpdateProeject');
    Route::post('deleteProjects', 'ProjectsController@deleteProjects');
});
