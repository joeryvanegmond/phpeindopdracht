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

Route::get('/home', function () {

    if (Auth::user() != null)
    {
        if (Auth::user()->isAdmin())
        {
            return view('admin');
        }
    }

    return view('welcome');
});


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user', 'HomeController@index')->name('user');

    Route::group(['middleware' => ['admin']], function () {

        Route::get('/admin', 'HomeController@admin')->name('admin');
    });
});

//Route::get('/home', 'HomeController@index')->name('home');

Route::resource('course', 'CourseController');
Route::resource('teacher', 'TeacherController');
