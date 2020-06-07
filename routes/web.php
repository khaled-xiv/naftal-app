<?php

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
    Route::post('/account/close', 'AccountController@close');

    //  User routes
    Route::group(['middleware'=>'role:admin,chief_district'],function() {
        Route::get(LaravelLocalization::transRoute('routes.users'), 'UsersController@index')->name('users.show');
        Route::get(LaravelLocalization::transRoute('routes.user-show'), 'UsersController@show')->name('users.edit');
        Route::patch(LaravelLocalization::transRoute('routes.user-update'), 'UsersController@update')->name('user.update');
        Route::post('/users/removeAddress/{id}', 'UsersController@removeAddress');
        Route::post('/users/removePhone/{id}', 'UsersController@removePhone');
        Route::post('/users/close/{id}', 'UsersController@close');
    });

    //  Request of intervention routes
//    Route::group(['middleware'=>'role:chief_district,chief_center'],function() {

    Route::get(LaravelLocalization::transRoute('routes.request'), 'Req_interController@index')->name('requests.show');
    Route::get(LaravelLocalization::transRoute('routes.request-create'), 'Req_interController@create')->name('request.create');
    Route::get(LaravelLocalization::transRoute('routes.request-edit'), 'Req_interController@edit')->name('request.edit');
    Route::post(LaravelLocalization::transRoute('routes.request'), 'Req_interController@store')->name('request.store');

        Route::Put('/request-of-intervention/{request_of_intervention}', 'Req_interController@update_after_inter');
        Route::Put('/request-of-intervention-district/{request_of_intervention}', 'Req_interController@update_discrict_inter');
        Route::post('/getequipment', 'Req_interController@getEquipment');
        Route::post('/getSelectedComps', 'Req_interController@getSelectedComps');
//    });


});

//});
//    Route::resource('centers', 'CenterController');
//    Route::resource('equipments', 'EquipmentController');
//    Route::resource('components', 'ComponentController');
//    Route::resource('forums', 'ForumController');
//    Route::resource('answers', 'AnswerController');
//    Route::post('forums/{id}/upvote', 'ForumController@upvote');
//    Route::post('forums/{id}/downvote', 'ForumController@downvote');
//    Route::post('answers/{id}/upvote', 'AnswerController@upvote');
//    Route::post('answers/{id}/downvote', 'AnswerController@downvote');
//    Route::get('tags/{id}/search', 'TagController@search');
//    Route::get('search/results', 'ForumController@search');


