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
Route::resource('/users', 'UsersController');


Route::resource('/request-of-intervention', 'Req_interController') ;
Route::Put('/request-of-intervention/{request_of_intervention}', 'Req_interController@update_after_inter') ;
Route::Put('/request-of-intervention-district/{request_of_intervention}', 'Req_interController@update_discrict_inter') ;
Route::post('/getequipment', 'Req_interController@getEquipment') ;




Route::group(['middleware'=>'chef_district'],function(){

//    Route::get('users/create', 'Auth\RegisterController@showRegistrationForm')->name('register');
//    Route::post('users/create', 'Auth\RegisterController@register');
});

Route::get('users/create', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('users/create', 'Auth\RegisterController@register');


Route::resource('centers', 'CenterController');
Route::resource('equipments', 'EquipmentController');
Route::resource('components', 'ComponentController');
Route::resource('forums', 'ForumController');
Route::resource('answers', 'AnswerController');
Route::post('forums/{id}/upvote', 'ForumController@upvote');
Route::post('forums/{id}/downvote', 'ForumController@downvote');
Route::post('answers/{id}/upvote', 'AnswerController@upvote');
Route::post('answers/{id}/downvote', 'AnswerController@downvote');
