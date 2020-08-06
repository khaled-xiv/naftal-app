<?php

use GuzzleHttp\Client;

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','localize','setLang']], function()
{
    //    Home route
    Route::get('/', 'HomeController@index')->name('home');


    //    contact route
    Route::post('/sendEmail', 'HomeController@sendEmail')->name('send-email') ;

    //    login routes
    Route::get(LaravelLocalization::transRoute('routes.login'), 'Auth\LoginController@showLoginForm')->name('login');
    Route::post(LaravelLocalization::transRoute('routes.login'), 'Auth\LoginController@login')->name('login');
    Route::get(LaravelLocalization::transRoute('routes.logout'), function () {
        Auth::logout();
        return redirect("/");
    })->name('logout');

    //  registration routes
    Route::group(['middleware'=>'role:admin'],function(){
        Route::get(LaravelLocalization::transRoute('routes.user-create'), 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post(LaravelLocalization::transRoute('routes.user-create'), 'Auth\RegisterController@register')->name('register');
    });

    //    reset password routes
    Route::get(LaravelLocalization::transRoute('routes.password-request'), 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::get(LaravelLocalization::transRoute('routes.password-reset'), 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post(LaravelLocalization::transRoute('routes.password-request'), 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('/password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    //    verification routes
    Route::get(LaravelLocalization::transRoute('routes.verification-notice'), 'Auth\VerificationController@show')->name('verification.notice');
    Route::get(LaravelLocalization::transRoute('routes.verification-verify'), 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post(LaravelLocalization::transRoute('routes.verification-resend'), 'Auth\VerificationController@resend')->name('verification.resend');

    //    Account routes
    Route::get(LaravelLocalization::transRoute('routes.account'), 'AccountController@index')->name('account.show');
    Route::patch(LaravelLocalization::transRoute('routes.account-update'), 'AccountController@update')->name('account.update');
    Route::post('/account/removeAddress', 'AccountController@removeAddress');
    Route::post('/account/removePhone', 'AccountController@removePhone');
    Route::post('/account/remove-fblink', 'AccountController@removeFbLink');
    Route::post('/account/remove-twitterlink', 'AccountController@removeTwitterLink');
    Route::post('/account/remove-gmaillink', 'AccountController@removeGmailLink');
    Route::post('/account/close', 'AccountController@close');
    Route::post('/upload-image', 'AccountController@upladeImage');
    Route::get('/remove-image', 'AccountController@removeImage');

    //  User routes
    Route::group(['middleware'=>'role:admin,district chief'],function() {
        Route::get(LaravelLocalization::transRoute('routes.users'), 'UsersController@index')->name('users.show');
        Route::get(LaravelLocalization::transRoute('routes.user-show'), 'UsersController@show')->name('users.edit');
        Route::patch(LaravelLocalization::transRoute('routes.user-update'), 'UsersController@update')->name('user.update');
        Route::post('/users/removeAddress/{id}', 'UsersController@removeAddress');
        Route::post('/users/removePhone/{id}', 'UsersController@removePhone');
        Route::post('/users/close/{id}', 'UsersController@close');
    });

    Route::group(['middleware'=>'role:center chief'],function() {
        Route::get(LaravelLocalization::transRoute('routes.request-create'), 'Req_interController@create')->name('request.create');
    });

    Route::get(LaravelLocalization::transRoute('routes.request'), 'Req_interController@index')->name('requests.show');
    Route::get(LaravelLocalization::transRoute('routes.request-edit'), 'Req_interController@edit')->name('request.edit');
    Route::post(LaravelLocalization::transRoute('routes.request'), 'Req_interController@store')->name('request.store');
    Route::Put('/request-of-intervention/{id}', 'Req_interController@update');
    Route::Delete('/request-of-intervention/{id}/delete', 'Req_interController@destroy');

    Route::Put('/request-of-interventions/{request_of_intervention}', 'Req_interController@update_after_inter');
    Route::Put('/request-of-intervention-district/{request_of_intervention}', 'Req_interController@update_discrict_inter');
    Route::post('/getequipment', 'Req_interController@getEquipment');
    Route::post('/getSelectedComps', 'Req_interController@getSelectedComps');
//    });

    //Route::resource('centers', 'CenterController');
    Route::get(LaravelLocalization::transRoute('routes.centers'), 'CenterController@index');
    Route::get(LaravelLocalization::transRoute('routes.center-create'), 'CenterController@create')->name('center.create');
    Route::get(LaravelLocalization::transRoute('routes.center-edit'), 'CenterController@edit')->name('center.edit');
    Route::post('centers', 'CenterController@store');
    Route::delete('centers/{id}', 'CenterController@destroy');
    Route::put('centers/{id}', 'CenterController@update');

    //Route::resource('equipments', 'EquipmentController');
    Route::get(LaravelLocalization::transRoute('routes.equipments'), 'EquipmentController@index');
    Route::get(LaravelLocalization::transRoute('routes.equipment-create'), 'EquipmentController@create');
    Route::get(LaravelLocalization::transRoute('routes.equipment-edit'), 'EquipmentController@edit');
    Route::post('equipments', 'EquipmentController@store');
    Route::delete('equipments/{id}', 'EquipmentController@destroy');
    Route::put('equipments/{id}', 'EquipmentController@update');

    //Route::resource('components', 'ComponentController');
    Route::get(LaravelLocalization::transRoute('routes.component-edit'), 'ComponentController@edit');
    Route::post('components', 'ComponentController@store');
    Route::delete('components/{id}', 'ComponentController@destroy');
    Route::put('components/{id}', 'ComponentController@update');

//    Route::resource('forums', 'ForumController');
    Route::get(LaravelLocalization::transRoute('routes.forums'), 'ForumController@index');
    Route::get(LaravelLocalization::transRoute('routes.forum-show'), 'ForumController@show');
    Route::get(LaravelLocalization::transRoute('routes.forum-create'), 'ForumController@create')->name('forums');
    Route::get(LaravelLocalization::transRoute('routes.forum-edit'), 'ForumController@edit');
    Route::post('forums', 'ForumController@store');
    Route::delete('forums/{id}', 'ForumController@destroy');
    Route::put('forums/{id}', 'ForumController@update');

    Route::resource('answers', 'AnswerController');
    Route::post('forums/{id}/upvote', 'ForumController@upvote');
    Route::post('forums/{id}/downvote', 'ForumController@downvote');
    Route::post('answers/{id}/upvote', 'AnswerController@upvote');
    Route::post('answers/{id}/downvote', 'AnswerController@downvote');
    Route::get('tags/{id}/search', 'TagController@search');
    Route::get('search/results', 'ForumController@search');

//  Dashboard routes
    Route::get('dashboard', 'DashboardController@index');
    Route::get('dashboard/errors', 'DashboardController@getErrors');
    Route::get('dashboard/maints', 'DashboardController@getmaints');
    Route::get('dashboard/failures', 'DashboardController@getFailures');

});


