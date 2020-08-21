<?php

use App\Events\SendNotifications;
use App\Notification;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Pusher\Pusher;

Route::post('broadcasting/auth',function (){
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    $pusher = new Pusher(config('broadcasting.connections.pusher.key'),
        config('broadcasting.connections.pusher.secret'),
        config('broadcasting.connections.pusher.app_id'));

    $auth=$pusher->socket_auth($_POST['channel_name'],$_POST['socket_id']);
    return response($auth);
    });


Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','localize','setLang']], function()
{
    //    Home route
    Route::get('/', 'HomeController@index')->name('home');

    //mark notification as read
    Route::post('/mark-as-read',function (){
        Notification::where('user_id',Auth()->user()->id)
            ->where('is_read',0)->update(['is_read'=>1]);
        return response()->json(['success'=>true],200);

    });

    Route::get('test', function () {
        $notification=Notification::create([
            'user_id'=>1,
            'link'=>1,
            'sender'=>'khaled',
            'user_photo'=>'profile-placeholder.jpg',
            'is_read'=>0,
            'content'=>"hi",
        ]);
        event(new SendNotifications($notification));
        return "Event has been sent!";
    });

    //    contact route
    Route::post('/sendEmail', 'HomeController@sendEmail')->name('send-email') ;

    //    login routes
    Route::get(LaravelLocalization::transRoute('routes.login'), 'Auth\LoginController@showLoginForm')->name('login');
    Route::post(LaravelLocalization::transRoute('routes.login'), 'Auth\LoginController@login')->name('login');
    Route::get(LaravelLocalization::transRoute('routes.logout'), 'Auth\LoginController@logout')->name('logout');

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



    Route::get(LaravelLocalization::transRoute('routes.centers'), 'CenterController@index')->middleware('role:admin,district chief,center chief');
    Route::get(LaravelLocalization::transRoute('routes.center-create'), 'CenterController@create')->name('center.create')->middleware('role:admin,district chief');
    Route::get(LaravelLocalization::transRoute('routes.center-edit'), 'CenterController@edit')->name('center.edit')->middleware('role:admin,district chief');
    Route::post('centers', 'CenterController@store')->middleware('role:admin,district chief');
    Route::delete('centers/{id}', 'CenterController@destroy')->middleware('role:admin,district chief');
    Route::put('centers/{id}', 'CenterController@update')->middleware('role:admin,district chief');

    //    Account routes
    Route::get(LaravelLocalization::transRoute('routes.account'), 'AccountController@index')
        ->name('account.show');
    Route::patch(LaravelLocalization::transRoute('routes.account-update'), 'AccountController@update')
        ->name('account.update');
    Route::post('/account/removeAddress', 'AccountController@removeAddress');
    Route::post('/account/removePhone', 'AccountController@removePhone');
    Route::post('/account/remove-fblink', 'AccountController@removeFbLink');
    Route::post('/account/remove-twitterlink', 'AccountController@removeTwitterLink');
    Route::post('/account/remove-gmaillink', 'AccountController@removeGmailLink');
    Route::post('/account/close', 'AccountController@close');
    Route::post('/upload-image', 'AccountController@upladeImage');
    Route::get('/remove-image', 'AccountController@removeImage');


    //  users routes
    Route::get(LaravelLocalization::transRoute('routes.user-create'), 'Auth\RegisterController@showRegistrationForm')
        ->name('register');
    Route::post(LaravelLocalization::transRoute('routes.user-create'), 'Auth\RegisterController@register')
        ->name('register');
    Route::get(LaravelLocalization::transRoute('routes.users'), 'UsersController@index')
        ->name('users.show')->middleware('role:admin,center chief,district chief');
    Route::get(LaravelLocalization::transRoute('routes.user-show'), 'UsersController@show')
        ->name('users.edit')->middleware('role:admin');
    Route::patch(LaravelLocalization::transRoute('routes.user-update'), 'UsersController@update')
        ->name('user.update')->middleware('role:admin');
    Route::post('/users/close/{id}', 'UsersController@close')
        ->middleware('role:admin');

    // request of intervention routes
    Route::get(LaravelLocalization::transRoute('routes.request'), 'Req_interController@index')
        ->name('requests.show')->middleware('role:admin,center chief,district chief');
    Route::get(LaravelLocalization::transRoute('routes.request-create'), 'Req_interController@create')
        ->name('request.create')->middleware('role:center chief');
    Route::get(LaravelLocalization::transRoute('routes.request-edit'), 'Req_interController@edit')
        ->name('request.edit')->middleware('role:center chief,district chief');
    Route::post(LaravelLocalization::transRoute('routes.request'), 'Req_interController@store')
        ->name('request.store')->middleware('role:center chief');
    Route::Put('/request-of-intervention/{id}', 'Req_interController@update')
        ->middleware('role:center chief');
    Route::Delete('/request-of-intervention/{id}/delete', 'Req_interController@destroy')
        ->middleware('role:center chief');
    Route::Put('/request-of-interventions/{request_of_intervention}', 'Req_interController@update_after_inter')
        ->middleware('role:center chief');
    Route::Put('/request-of-intervention-district/{request_of_intervention}', 'Req_interController@update_discrict_inter')
        ->middleware('role:district chief');
    Route::post('/getequipment', 'Req_interController@getEquipment');
    Route::post('/getSelectedComps', 'Req_interController@getSelectedComps');



    //Route::resource('equipments', 'EquipmentController');
    Route::get(LaravelLocalization::transRoute('routes.equipments'), 'EquipmentController@index')->middleware('role:admin,district chief,center chief');
    Route::get(LaravelLocalization::transRoute('routes.equipment-create'), 'EquipmentController@create')->name('equipment-create')->middleware('role:admin,district chief');
    Route::get(LaravelLocalization::transRoute('routes.equipment-edit'), 'EquipmentController@edit')->middleware('role:admin,district chief');
    Route::post('equipments', 'EquipmentController@store')->middleware('role:admin,district chief');
    Route::delete('equipments/{id}', 'EquipmentController@destroy')->middleware('role:admin,district chief');
    Route::put('equipments/{id}', 'EquipmentController@update')->middleware('role:admin,district chief');

    //Route::resource('components', 'ComponentController');
    Route::get(LaravelLocalization::transRoute('routes.component-edit'), 'ComponentController@edit')->middleware('role:admin,district chief');
    Route::post('components', 'ComponentController@store')->middleware('role:admin,district chief');
    Route::delete('components/{id}', 'ComponentController@destroy')->middleware('role:admin,district chief');
    Route::put('components/{id}', 'ComponentController@update')->middleware('role:admin,district chief');

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
    Route::get(LaravelLocalization::transRoute('routes.dashboard'), 'DashboardController@index');
    Route::get('dashboard/errors', 'DashboardController@getErrors');
    Route::get('dashboard/maints', 'DashboardController@getmaints');
    Route::get('dashboard/failures', 'DashboardController@getFailures');

});


