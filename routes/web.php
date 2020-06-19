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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['prefix' => 'dashboard','namespace' => 'Dashboard'], function () {
    /*==== login */
    Route::get('login', 'UserController@viewLogin')->name('dashboard.login');
    Route::post('login', 'UserController@login')->name('dashboard.login');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('index', 'HomeController@index')->name('dashboard.index');

        Route::resource('product', 'ProductController');
        Route::get('product/{id}/active','ProductController@active');
        Route::get('product/{id}/deactive','ProductController@deactive');

        Route::resource('client', 'ClientController');
        Route::get('client/{id}/active', 'ClientController@active');
        Route::get('client/{id}/deactive', 'ClientController@deactive');
        Route::resource('link', 'LinkController');
        Route::resource('contact', 'ContactController');
        Route::resource('category', 'CategoryController');
        Route::resource('order', 'OrderController');
        Route::resource('page', 'PageController');
        Route::get('order/{id}/active', 'OrderController@active');
        Route::get('order/{id}/deactive', 'OrderController@deactive');
        Route::get('order/{id}/canceled', 'OrderController@canceled');
        Route::get('order/{id}/finished', 'OrderController@finish');
        Route::get('profile-user/{id}', 'UserController@viewProfileUser')->name('profile.user');
        Route::post('profile-user/{id}', 'UserController@profileUser')->name('profile.user');
        Route::get('change-password', 'UserController@changePasswordView')->name('change.password');
        Route::post('change-password', 'UserController@changePassword')->name('change.password');

        Route::get('setting', 'SettingController@index')->name('setting.index');
        Route::get('setting/edit/{id}', 'SettingController@edit')->name('setting.edit');
        Route::post('setting/update/{id}', 'SettingController@update')->name('setting.update');

        Route::get('logout/admin', 'UserController@logout')->name('logout.admin');

    });

});