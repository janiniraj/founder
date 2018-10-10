<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'PageController@index')->name('index');
Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact/send', 'ContactController@send')->name('contact.send');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
    });
});

Route::get('/page/{slug}', 'PageController@showPage')->name('show-page');

Route::group(['as' => 'blog.'], function () {
    Route::get('blogs', 'BlogController@index')->name('index');
    Route::get('blog/{slug}', 'BlogController@show')->name('show');
});

Route::group(['as' => 'news.'], function () {
    //Route::get('news', 'NewsController@index')->name('index');
    Route::get('news/{slug}', 'NewsController@show')->name('show');
});

Route::get('recognition-awards', 'PageController@awards')->name('recognition-awards');

Route::get('recognition-quotes/{limit?}', 'PageController@quotes')->name('recognition-quotes');

Route::get('publications', 'PageController@publications')->name('publications');

Route::group(['as' => 'speech.'], function () {
    Route::get('speeches', 'SpeechController@index')->name('index');
    Route::get('speech/{slug}', 'SpeechController@show')->name('show');
});

Route::post('email-subscription', 'PageController@emailSubscription')->name('email-subscription');