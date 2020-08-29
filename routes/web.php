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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::prefix('admin')->group(function() {
    //Authentication
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    //Dashboard
    Route::get('/','Admin\AdminController@index')->name('admin.dashboard');
    //Users
    Route::get('/users','Admin\UserController@index')->name('admin.users.list');
    Route::get('/users/add','Admin\UserController@add')->name('admin.users.add');
    Route::post('/users/add','Admin\UserController@save')->name('admin.users.save');
    Route::get('/users/edit/{id}','Admin\UserController@edit')->name('admin.users.edit');
    Route::post('/users/edit/{id}','Admin\UserController@update')->name('admin.users.update');
    Route::get('/users/delete/{id}','Admin\UserController@delete')->name('admin.users.delete');
});
