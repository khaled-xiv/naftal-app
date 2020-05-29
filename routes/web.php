<?php

Route::redirect('/', app()->getLocale());

Route::group(['prefix' => '{language}','where' => ['language' => '[a-zA-Z]{2}'],'middleware' => 'setLang'], function ($language) {

    Auth::routes();

    Route::get('/password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset/', 'Auth\ResetPasswordController@reset')->name('password.reset');

    Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');



    Route::get('/logout', function () {
        Auth::logout();
        return redirect("/".app()->getLocale());
    });

    Route::get('/', 'HomeController@index')->name('home') ;
    Route::post('/sendEmail', 'HomeController@sendEmail') ;

    Route::resource('/account', 'AccountController');

    Route::group(['middleware' => 'role:chief_district,chief_center,technician,admin'], function () {
        Route::post('/account/removeAddress', 'AccountController@removeAddress');
        Route::post('/account/removePhone', 'AccountController@removePhone');
        Route::post('/account/close', 'AccountController@close');

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
    Route::get('search/results', 'ForumController@search');

});


