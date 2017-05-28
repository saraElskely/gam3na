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
Route::prefix('admin')->group(function(){
Route::get('/login', 'Auth\AdminLoginControler@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginControler@login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.dashboard');

Route::resource('/users','AdminusersController');
Route::resource('/categories','AdmincategoriesController');
Route::resource('/subcategories','AdmincsubcategoriesController');
Route::resource('/events','AdmineventsController');
});
Route::get('/','homeController@home');
Route::get('/home/{id}','homeController@show');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('event','Events');
Route::post('/event/{event}/comments','Commentscontroller@store');
Route::post('/event/{event}/reviews','ReviewsController@store');
Route::post('/event/{event}/reports','ReportsController@store');

Route::get('/event/{event}/attendance','Events@user_attend')->name('attended');

Route::get('/categories/{id}/subscribe','CategoriesController@user_subscribe')->name('subscribe');
Route::resource('/categories','CategoriesController',['except'=>['edit','update','destroy']]);
