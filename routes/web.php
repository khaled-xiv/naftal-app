<?php


Auth::routes(['verify'=>true]);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/', 'HomeController@index')->name('home') ;
Route::post('/sendEmail', 'HomeController@sendEmail') ;

Route::group(['middleware'=>'role:chief_district,chief_center,technician,admin'],function() {
    Route::post('/account/removeAddress', 'AccountController@removeAddress');
    Route::post('/account/removePhone', 'AccountController@removePhone');
    Route::post('/account/close', 'AccountController@close');
    Route::resource('/account', 'AccountController')->middleware('auth');
});

Route::group(['middleware'=>'role:admin,chief_district'],function() {
    Route::post('/users/removeAddress/{id}', 'UsersController@removeAddress');
    Route::post('/users/removePhone/{id}', 'UsersController@removePhone');
    Route::post('/users/close/{id}', 'UsersController@close');
    Route::resource('/users', 'UsersController');
});

Route::group(['middleware'=>'role:chief_district,chief_center'],function() {
    Route::resource('/request-of-intervention', 'Req_interController');
    Route::Put('/request-of-intervention/{request_of_intervention}', 'Req_interController@update_after_inter');
    Route::Put('/request-of-intervention-district/{request_of_intervention}', 'Req_interController@update_discrict_inter');
    Route::post('/getequipment', 'Req_interController@getEquipment');
    Route::post('/getSelectedComps', 'Req_interController@getSelectedComps');
});



//Route::group(['middleware'=>'role:admin'],function(){
    Route::get('users/create', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('users/create', 'Auth\RegisterController@register');
//});



Route::resource('centers', 'CenterController');
Route::resource('equipments', 'EquipmentController');
Route::resource('components', 'ComponentController');
Route::resource('forums', 'ForumController');
Route::resource('answers', 'AnswerController');
Route::post('forums/{id}/upvote', 'ForumController@upvote');
Route::post('forums/{id}/downvote', 'ForumController@downvote');
Route::post('answers/{id}/upvote', 'AnswerController@upvote');
Route::post('answers/{id}/downvote', 'AnswerController@downvote');
Route::get('tags/{id}/search', 'TagController@search');
