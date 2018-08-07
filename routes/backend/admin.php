<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', 'DashboardController@index')->name('dashboard');


/**
 *  Page Management
 */
Route::group(['namespace' => 'Page'], function () {
    Route::resource('pages', 'PageController', ['except' =>
        ['show']]);

    //For DataTables
    Route::post('pages/get', 'PageTableController')
        ->name('pages.get');
});

/**
 *  Blog Management
 */
Route::group(['namespace' => 'Blog'], function () {
    Route::resource('blogs', 'BlogController', ['except' =>
        ['show']]);
});

/**
 *  Award Management
 */
Route::group(['namespace' => 'Award'], function () {
    Route::resource('awards', 'AwardController', ['except' =>
        ['show']]);
});