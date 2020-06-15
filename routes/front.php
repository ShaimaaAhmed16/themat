<?php

    Route::get('register', 'AuthController@viewRegister')->name('register.client');
    Route::post('register', 'AuthController@register')->name('register.client');

    Route::get('login', 'AuthController@viewLogin')->name('login.client');
    Route::post('login', 'AuthController@login')->name('login.client');
    Route::get('reset/password-client', 'AuthController@resetPassword')->name('reset.password');
    Route::post('send/code', 'AuthController@sendMessage')->name('send.code');
    Route::get('activation-page', 'AuthController@activationPage')->name('activation-page');
    Route::post('activation', 'AuthController@activation')->name('activation');
    Route::get('checkCode/{phone?}', 'AuthController@checkCodePage')->name('checkCode');
    Route::get('change-password', 'AuthController@newPassword')->name('newPassword');
    Route::post('check/code', 'AuthController@checkCode')->name('check.code');
    Route::post('change/password', 'AuthController@changePassword')->name('change.password');

    Route::get('/', 'MainController@homeClient')->name('home');
    Route::get('index', 'MainController@index')->name('index');


    Route::get('main', 'MainController@main')->name('main');


    Route::get('auth/{provider}', 'AuthController@redirectToProvider');
    Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');

    Route::get('contact/client', 'MainController@viewContact')->name('contact.client');
    Route::post('contact/client', 'MainController@contact')->name('contact.client');

    Route::get('about', 'MainController@about')->name('about');




    Route::group(['middleware'=>'client-web'],function () {
        Route::get('filter', 'MainController@viewFilter')->name('filter');

        //this routes for active client only
        Route::group(['middleware'=>['IsActive']],function () {
            Route::get('details/product/{id}', 'MainController@detailsProduct')->name('details');
            Route::get('cart', 'CartController@index')->name('cart');
            Route::post('add-cart', 'CartController@store');
            Route::get('update-quantity/{product}', 'CartController@update');
            Route::get('empty', 'CartController@empty')->name('empty');
            Route::delete('remove/{product}', 'CartController@destroy');
            Route::get('profile-client/{id}', 'AuthController@viewProfile')->name('profile.client');
            Route::post('profile-update/{id}', 'AuthController@profile')->name('profile');
            Route::get('myacount', 'AuthController@myAccount')->name('myacount');

            Route::get('map', 'MainController@viewMap')->name('map');
            Route::post('map', 'MainController@map')->name('map');

            Route::get('done', 'MainController@done')->name('done');

            Route::get('myorder', 'MainController@myOrder')->name('myorder');
            Route::get('addorder', 'MainController@addOrder')->name('addorder');
            Route::get('logout', 'AuthController@logout')->name('logout');
        });
    });

