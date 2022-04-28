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

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;

Route::get('/', 'HomeController@welcomepage');

Auth::routes();
Route::middleware('isadmin')->group(function () {
    Route::get('/user','HomeController@addUser');
});

Route::middleware('checkauth')->group(function () {
    Route::get('/viewCourse', 'CourseController@view');
    Route::get('/editUser/{id}', 'HomeController@edit');
    Route::delete('/deleteUser/{id}', 'HomeController@delete');
    Route::get('/viewUsers', 'HomeController@viewUser');
    Route::get('/dashboard', 'HomeController@dashboard');
    Route::put('/updateUsers/{id}', 'HomeController@update');
    Route::get('/viewStudents', 'StudentController@view');
    Route::get('/viewRelationship', 'StudentController@viewRelations');
    Route::get('/viewTeacher', 'TeacherController@view');
});
Route::get('/home', 'HomeController@countUser');


