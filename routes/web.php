<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Authentication

Auth::routes(['verify' => true]);

// language

Route::post('language/', [
    'before' => 'csrf',
    'as' => 'language-chooser',
    'uses' => 'LanguageController@changeLanguage'
]);

// security

Route::namespace('Auth')
    ->prefix('security')
    ->middleware('auth')
    ->group(function (){

        Route::get('/', 'SecurityController@security')
            ->name('security');

        Route::post('/', 'SecurityController@email')
            ->name('security.email');

        Route::put('/', 'SecurityController@password')
            ->name('security.password');

    });

// todo: real [Profile]

Route::namespace('Personal')
    ->middleware('auth')
    ->group(function (){

        // params

        Route::prefix('params')->group(function (){

            Route::get('/','ParamsController@paramsForm')->name('params');
            Route::post('/','ParamsController@params');

        });

        // address

        Route::resource('address','AddressController')->except(['show']);

        // phone

        Route::resource('phone','MobileController')->except(['show']);

        // profile

        Route::get('profile','RealController@profile')->name('profile');

        // Token

        Route::resource('token','TokenController')->except(['show']);

    });


// Blog home

Route::get('/', function () {
    return view('welcome');
});

// dashboard

Route::get('/home', 'HomeController@index')->name('home');

//todo:: localize arabic

