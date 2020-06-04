<?php

Route::redirect('/', app()->getLocale());

Route::get('/{fr}/changeLang',function (){

    return url()->previous();
//     return \Illuminate\Support\Facades\Route::currentRouteName();
    App::setLocale(Request::segment(1));
    Config::set('app.locale_prefix', Request::segment(1));
    return redirect(url()->previous());
});

if (in_array(Request::segment(1), Config::get('app.alt_langs'))) {
    App::setLocale(Request::segment(1));
    Config::set('app.locale_prefix', Request::segment(1));
}

foreach(Lang::get('routes') as $k => $v) {
    Route::pattern($k, $v);
}

Route::group(['prefix' => '{language}','where' => ['language' => '[a-zA-Z]{2}']],function (){
    //home route
    Route::get('/', 'HomeController@index')->name('home');
    //contact route
    Route::post('/sendEmail', 'HomeController@sendEmail') ;
    //login routes
    Route::get('/{login}/', 'Auth\LoginController@showLoginForm')->name('login')->where('login', Lang::get('routes.login'));
    Route::post('/{login}/', 'Auth\LoginController@login')->where('login', Lang::get('routes.login'));
    Route::get('/{logout}', function () {
        Auth::logout();
        return redirect("/".app()->getLocale());
    })->where('logout', Lang::get('routes.logout'));
    //registration routes
    Route::group(['middleware'=>'role:admin'],function(){
        Route::get('{users}/{create}', 'Auth\RegisterController@showRegistrationForm')->name('register')
            ->where(['users'=>Lang::get('routes.users'),'create'=>Lang::get('routes.create')]);
        Route::post('{users}/{create}', 'Auth\RegisterController@register')
            ->where(['users'=>Lang::get('routes.users'),'create'=>Lang::get('routes.create')]);
    });
    //reset password routes
    Route::get('{password}/{reset}', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request')
        ->where(['password'=>Lang::get('routes.password'),'reset'=>Lang::get('routes.reset')]);
    Route::get('/password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/{password}/{reset}/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset')
        ->where(['password'=>Lang::get('routes.password'),'reset'=>Lang::get('routes.reset')]);
//    Route::post('/password/reset/', 'Auth\ResetPasswordController@reset')->name('password.reset');
    Route::post('{password}/{reset}', 'Auth\ResetPasswordController@reset')->name('password.update')
        ->where(['password'=>Lang::get('routes.password'),'reset'=>Lang::get('routes.reset')]);
    //verification routes
    Route::get('/email/{verify}', 'Auth\VerificationController@show')->name('verification.notice')
        ->where(['verify'=>Lang::get('routes.verify')]);
    Route::get('email/{verify}/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify')
        ->where(['verify'=>Lang::get('routes.verify')]);
    Route::post('email/{resend}', 'Auth\VerificationController@resend')->name('verification.resend')
        ->where(['resend'=>Lang::get('routes.resend')]);
    //account routes
    Route::get('/{account}', 'AccountController@index')->name('account.show')
        ->where(['account'=>Lang::get('routes.account')]);
    Route::patch('/account/update/{id}', 'AccountController@update')->name('account.update')
        ->where(['account'=>Lang::get('routes.account')]);
    Route::post('/account/removeAddress', 'AccountController@removeAddress');
    Route::post('/account/removePhone', 'AccountController@removePhone');
    Route::post('/account/close', 'AccountController@close');

    Route::group(['middleware'=>'role:admin,chief_district'],function() {
        Route::post('/users/removeAddress/{id}', 'UsersController@removeAddress');
        Route::post('/users/removePhone/{id}', 'UsersController@removePhone');
        Route::post('/users/close/{id}', 'UsersController@close');
        Route::get('/{users}/', 'UsersController@index')->where('users', Lang::get('routes.users'));
    });
//    Request of intervention routes
//    Route::group(['middleware'=>'role:chief_district,chief_center'],function() {


    Route::get('/{request}', 'Req_interController@index')
        ->where('request', Lang::get('routes.request'));
    Route::get('/{request}/{create}', 'Req_interController@create')
        ->where(['request', Lang::get('routes.request'),'create', Lang::get('routes.create')]);
    Route::post('/{request}', 'Req_interController@store')
        ->where(['request', Lang::get('routes.request'),'create', Lang::get('routes.create')]);
//        Route::Put('/request-of-intervention/{request_of_intervention}', 'Req_interController@update_after_inter');
//        Route::Put('/request-of-intervention-district/{request_of_intervention}', 'Req_interController@update_discrict_inter');
//        Route::post('/getequipment', 'Req_interController@getEquipment');
//        Route::post('/getSelectedComps', 'Req_interController@getSelectedComps');
//    });




});
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


