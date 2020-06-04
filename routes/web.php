<?php

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','localize','setLang']], function()
{

    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', 'HomeController@index')->name('home');
    //contact route
    Route::post('/sendEmail', 'HomeController@sendEmail') ;


    //login routes
    Route::get(LaravelLocalization::transRoute('routes.login'), 'Auth\LoginController@showLoginForm');
    Route::post(LaravelLocalization::transRoute('routes.login'), 'Auth\LoginController@login');
    Route::get(LaravelLocalization::transRoute('routes.logout'), function () {
        Auth::logout();
        return redirect("/".app()->getLocale());
    });
    //registration routes
    Route::group(['middleware'=>'role:admin'],function(){
        Route::get(LaravelLocalization::transRoute('routes.user-create'), 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post(LaravelLocalization::transRoute('routes.user-create'), 'Auth\RegisterController@register');
    });
//    //reset password routes
    Route::get(LaravelLocalization::transRoute('routes.password-request'), 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::get(LaravelLocalization::transRoute('routes.password-reset'), 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post(LaravelLocalization::transRoute('routes.password-request'), 'Auth\ResetPasswordController@reset')->name('password.update');

    Route::get('/password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');


//    Route::post('/password/reset/', 'Auth\ResetPasswordController@reset')->name('password.reset');

    //verification routes
    Route::get('/email/{verify}', 'Auth\VerificationController@show')->name('verification.notice')
        ->where(['verify'=>Lang::get('routes.verify')]);
    Route::get('email/{verify}/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify')
        ->where(['verify'=>Lang::get('routes.verify')]);
    Route::post('email/{resend}', 'Auth\VerificationController@resend')->name('verification.resend')
        ->where(['resend'=>Lang::get('routes.resend')]);


    Route::get('/{account}', 'AccountController@index')->name('account.show')
        ->where(['account'=>Lang::get('routes.account')]);
    Route::patch('/account/update/{id}', 'AccountController@update')->name('account.update')
        ->where(['account'=>Lang::get('routes.account')]);
    Route::post('/account/removeAddress', 'AccountController@removeAddress');
    Route::post('/account/removePhone', 'AccountController@removePhone');
    Route::post('/account/close', 'AccountController@close');

    //  User routes
    Route::group(['middleware'=>'role:admin,chief_district'],function() {
        Route::post('/users/removeAddress/{id}', 'UsersController@removeAddress');
        Route::post('/users/removePhone/{id}', 'UsersController@removePhone');
        Route::post('/users/close/{id}', 'UsersController@close');
        Route::get(LaravelLocalization::transRoute('routes.users'), 'UsersController@index');
    });


});


    //account routes
//    Route::get('/{account}', 'AccountController@index')->name('account.show')
//        ->where(['account'=>Lang::get('routes.account')]);
//    Route::patch('/account/update/{id}', 'AccountController@update')->name('account.update')
//        ->where(['account'=>Lang::get('routes.account')]);
//    Route::post('/account/removeAddress', 'AccountController@removeAddress');
//    Route::post('/account/removePhone', 'AccountController@removePhone');
//    Route::post('/account/close', 'AccountController@close');


//    Request of intervention routes
//    Route::group(['middleware'=>'role:chief_district,chief_center'],function() {


//    Route::get('/{request}', 'Req_interController@index')
//        ->where('request', Lang::get('routes.request'));
//    Route::get('/{request}/{create}', 'Req_interController@create')
//        ->where(['request', Lang::get('routes.request'),'create', Lang::get('routes.create')]);
//    Route::post('/{request}', 'Req_interController@store')
//        ->where(['request', Lang::get('routes.request'),'create', Lang::get('routes.create')]);
//        Route::Put('/request-of-intervention/{request_of_intervention}', 'Req_interController@update_after_inter');
//        Route::Put('/request-of-intervention-district/{request_of_intervention}', 'Req_interController@update_discrict_inter');
//        Route::post('/getequipment', 'Req_interController@getEquipment');
//        Route::post('/getSelectedComps', 'Req_interController@getSelectedComps');
//    });




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


