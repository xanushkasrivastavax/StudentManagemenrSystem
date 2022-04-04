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

// use Illuminate\Routing\Route;


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/student', 'HomeController@getStudent');
Route::get('/landing', 'HomeController@landing');
Route::any('/course', 'CourseController@handle');
Route::get('/edituser/{id}', 'HomeController@edituser');
Route::get('/delete/{id}', 'HomeController@delete');
Route::get('/cinfo', 'CourseController@getCourse');
Route::get('/delete/{id}', 'CourseController@delete');
Route::patch('/edituser/{id}', 'HomeController@postedit');
Route::get('/editcourse/{id}', 'CourseController@editcourse');
Route::patch('/editcourse/{id}', 'CourseController@postedit');
Route::get('/home', 'HomeController@count');
Route::get('/display', 'HomeController@display');
Route::get('/display', 'HomeController@student');
// Route::get('/clear-cache', function() {
//     Artisan::call('cache:clear');
//     return "Cache is cleared";
// });
Route::get('/tdisplay', 'HomeController@teacher' );










