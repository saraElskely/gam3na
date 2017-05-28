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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home/{id}','homeController@show');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('event','Events');
Route::post('/event/{event}/comments','Commentscontroller@store');
Route::post('/event/{event}/reviews','ReviewsController@store');
Route::post('/event/{event}/reports','ReportsController@store');
Route::post('/event/{event}/photos','photosController@store');


Route::resource('/categories','CategoriesController',['except'=>['edit','update','destroy']]);

//facebook socilaite routes
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');