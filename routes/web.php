<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('departments', 'DepartmentController');

Route::resource('courses', 'CourseController')->except('create');
Route::get('courses/create/{id}', 'CourseController@create')->name('courses.create');

/**
 *  I decided to break the resource route to individual routes
 * to solve be able to store a topic through a course
 * 
 * I'll use this same techniq to store a course through a department
 */

Route::resource('topics', 'TopicController')->except(['create', 'store']);
Route::get('/topics/create/{id}', 'TopicController@create')->name('topics.create');
Route::post('/topics/store', 'TopicController@store')->name('topics.store');
Route::resource('students', 'StudentController');
Route::resource('relatives', 'RelativeController');
Route::GET('/students/{student}/relatives/assign', 'StudentController@assign_relatives')->name('students.relatives');
Route::PATCH('/students/{student}/assigning_relatives', 'StudentController@assigning_relatives')->name('students.assigning_relatives');
Route::resource('batches', 'BatchController')->except('create');
Route::get('/batches/create/{course}', 'BatchController@create')->name('batches.create');
Route::get('batches/{id}/add_teacher', 'BatchController@add_teacher')->name('batches.add_teacher');
Route::PATCH('batches/{id}/update_teacher', 'BatchController@update_teacher')->name('batches.update_teacher');
Route::resource('users', 'UserController');
Route::get('users/{user}/edit_roles', 'UserController@edit_roles')->name('users.edit_roles');
Route::PATCH('users/{user}/update_roles', 'UserController@update_roles')->name('users.update_roles');
Route::resource('documents', 'DocumentController');
Route::resource('receipts', 'ReceiptController')->except('create');
Route::get('receipts/add/{student}', 'ReceiptController@create')->name('receipts.create');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
