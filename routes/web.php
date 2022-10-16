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

Route::group(['middleware' => 'role:admin|user'], function() {

    Route::get('/todo-list', 'TodoListController@index')->name('todo.index');
    Route::post('/todo-list/add', 'TodoListController@addTodoList')->name('todo-list.add');
    Route::post('/todo-list/update', 'TodoListController@updateTodoList')->name('todo-list.update');

    Route::get('/delete-todo-list', 'TodoListController@delTodoList')->middleware(['ajax']);

    Route::post('/edit-content', 'Admin\AdminController@editContent')->name('admin.edit.content');
    Route::get('/profile', 'Admin\ProfileController@index')->name('admin.profile.index');
    Route::post('/edit-profile', 'Admin\ProfileController@edit')->name('admin.profile.edit');
    Route::get('/change-password', 'Admin\ProfileController@changeUserPassword')->name('admin.profile.password');
    Route::post('/change-password-process', 'Admin\ProfileController@changePasswordProcess')->name('admin.profile.edit-password');

});
Auth::routes([
    'register' => false
]);
Route::get('/', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login')->middleware('guest');
Route::get('/get-town', 'Admin\CityController@getTownByCity');
Route::post('login', 'Auth\LoginController@login')->name('user.login');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');


