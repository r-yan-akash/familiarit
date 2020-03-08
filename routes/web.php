<?php
//for-frontend-panel-customize
Route::get('/', 'Admin\HomeController@index')->name('frontend');
//for admin-panel theme
Route::get('/admin',function(){
    return view('Backend.index');
});
Route::get('/content',function(){
    return view('Backend.pages.contact.create');
});

Route::get('/content',function(){
    return view('Backend.pages.contact.create');
});
//end
//start-setting
Route::match(['get','post'],'setting','Admin\settingController@index')->name('setting');
//end-setting

//start-services
Route::get('services/delete/', 'Admin\ServiceController@destroy');
Route::get('/services/edit', 'Admin\ServiceController@edit');
Route::post('/services/update/', 'Admin\ServiceController@update');
Route::post('/services/add/', 'Admin\ServiceController@add');
Route::post('/single-service', 'Admin\ServiceController@singleService');
Route::resource('services','Admin\ServiceController');

//end-services

//start-quote
Route::resource('quote','Admin\QuoteController');
//end-quote

//start-slider
Route::resource('sliders','Admin\SliderController');
Route::post('/slider/add/', 'Admin\SliderController@add');
Route::post('/single-slider/', 'Admin\SliderController@singleSlider');
Route::get('/slider/edit/', 'Admin\SliderController@edit');
Route::post('/slider/update/', 'Admin\SliderController@update');
Route::get('slider/delete/', 'Admin\SliderController@delete');
//end-slider


//routes-for-auths
Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'Admin\Auth\LoginController@login');
  Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('logout');

  Route::get('/register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'Admin\Auth\RegisterController@register');

  Route::post('/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm');



});
//end-routes-for-auth


