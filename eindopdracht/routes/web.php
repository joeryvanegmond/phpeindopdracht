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

Route::group(['middleware' => 'admin'], function () {
    Route::resource('course', 'CourseController');
    Route::resource('teacher', 'TeacherController');
    Route::get('/admin', 'HomeController@admin')->name('admin');
    Route::get('/test/create/{id}', 'TestController@create');
    Route::get('/test/edit/{id}', 'TestController@edit');
    Route::get('/test/{id}', 'TestController@index');
    Route::post('/test/{id}', ['as'=>'test.store'], ['uses'=>'TestController@store']);
    Route::resource('test', 'TestController');
});

Route::group(['middleware' => 'manager'], function () {
    Route::get('manager', 'ManagerController@index');
    Route::get('manager/edit/{id}', 'ManagerController@edit');
    Route::patch('/manager/edit/{id}',['as'=>'manager.update','uses'=>'ManagerController@update']);
    Route::patch('completed', 'ManagerController@complete');
});

Route::get('/unauthorized', 'Controller@unauthorized');
Route::get('/', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index');
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/user', 'HomeController@index')->name('user');
});


