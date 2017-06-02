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
Route::get('/users/{id}/block', 'AdminusersController@block')->name('admin.block');	
Route::get('/users/{id}/unblock', 'AdminusersController@unblock')->name('admin.unblock');	
});

Route::get('/','homeController@home');
Route::get('/home','HomeController@index');
Route::get('/event/calendar','Events@calendar')->name('user.calendar');

Route::get('/home/{id}','homeController@show');

Route::prefix('profile')->group(function(){
	Route::get('/{id}','Profilecontroller@show');
	Route::get('/edit','Profilecontroller@editprofile')->name('profile.editprofile');
	Route::put('/update','Profilecontroller@updateprofile')->name('profile.updateprofile');
	Route::get('/','Profilecontroller@profile');

});

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/event/{event}/checkevent','Events@Check_event');

Route::resource('event','Events');
Route::post('/event/{event}/comments','Commentscontroller@store');
Route::post('/event/{event}/reviews','ReviewsController@store');
Route::post('/event/{event}/reports','ReportsController@store');
Route::post('/event/{event}/photos','photosController@store');


Route::get('/event/{event}/attendance','Events@user_attend')->name('attended');

Route::get('/categories/{id}/subscribe','CategoriesController@user_subscribe')->name('subscribe');
Route::resource('/categories','CategoriesController',['except'=>['edit','update','destroy']]);
Route::get('MarkAllSeen','Events@AllSeen');

//Social Media socialite routes
Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');
