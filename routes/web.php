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
Route::match(['get','post'],'setting','Admin\settingController@index')->name('setting');
Route::resource('services','Admin\ServiceController');
Route::resource('quote','Admin\QuoteController');
Route::resource('sliders','Admin\SliderController');
Route::post('/single-slider/', 'Admin\SliderController@singleSlider');


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

//  slider
Route::get('/slider/delete/{id}', 'Admin\SliderController@delete');
Route::get('/slider/edit/', 'Admin\SliderController@edit');
Route::post('/slider/update/', 'Admin\SliderController@update');
