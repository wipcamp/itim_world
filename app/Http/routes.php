<?php
Route::controller('itim', 'RegisterController');
Route::get('/',function(){
  //return redirect('auth/login');
});


Route::get('mail/{wip_id}/{verify}','AccountController@VerifySecond');
Route::group(['middleware' => ['web']], function () {
    Route::controller('auth','Auth\AuthController');
    Route::controller('profile','ProfileController');
    Route::controller('question','QuestionController');
    Route::any('accounts/login/{provider?}','Auth\AuthController@handle_login');
    Route::controller('account','AccountController');
    Route::get('logout','AccountController@getLogout');
    Route::group(['middleware' => ['web','checkpermission']], function () {
        Route::controller('dashboard','DashboardController');

        Route::get('session',function(){
          return Session::get('user');
        });



    });


});
Route::controller('document','DocumentController');
