<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//for-frontend-panel-customize
Route::get('/', function () {
    return view('frontend.index');
});

//for admin-panel theme
Route::get('/admin-it',function(){
    return view('Backend.index');
});
Route::get('/content',function(){
    return view('Backend.pages.contact.create');
});
//end


