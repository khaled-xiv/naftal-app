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

Auth::routes(['verify'=>true]);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});


Route::get('/home', 'HomeController@index')->name('home') ;

Route::post('/account/removeAddress', 'AccountController@removeAddress');
Route::post('/account/removePhone', 'AccountController@removePhone');
Route::post('/account/close', 'AccountController@close');
Route::resource('/account', 'AccountController')->middleware('auth') ;


Route::post('/users/removeAddress/{id}', 'UsersController@removeAddress');
Route::post('/users/removePhone/{id}', 'UsersController@removePhone');
Route::post('/users/close/{id}', 'UsersController@close');
Route::resource('/users', 'UsersController')->middleware('auth') ;




Route::group(['middleware'=>'chef_district'],function(){

//    Route::get('users/create', 'Auth\RegisterController@showRegistrationForm')->name('register');
//    Route::post('users/create', 'Auth\RegisterController@register');
});

Route::get('users/create', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('users/create', 'Auth\RegisterController@register');
