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


Route::get('users/create', 'Auth\RegisterController@showRegistrationForm');
Route::post('users/create', 'Auth\RegisterController@register')->name('register');

Route::group(['middleware'=>'chef_district'],function(){

    Route::get('center',function (){
        return view('center');
    } );

    Route::get('users/create', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('users/create', 'Auth\RegisterController@register');
});


