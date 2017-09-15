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
Auth::routes();
    Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', 'SupportController@index');
    Route::get('/home', 'SupportController@index');
    Route::get('/dashboard', 'SupportController@index');
//    User Panel
    Route::resource('/request', 'RequestController');
    Route::get('/profile', 'UserProfileController@index');
    Route::get('/profile/edit', 'UserProfileController@edit');

    Route::group(['middleware' => 'isAdmin'], function () {
        Route::resource('settings/region', 'Settings\\RegionController');
        Route::resource('settings/zone', 'Settings\\ZoneController');
        Route::resource('settings/branch', 'Settings\\BranchController');
        Route::get('settings/status', 'Settings\StatusController@index');
        Route::resource('settings/status', 'Settings\\StatusController');

        Route::get('settings/user/user_active_deactive/{id}', 'Settings\\UserController@user_active_deactive');
        Route::get('settings/user/active_deactive/{id}', 'Settings\\UserController@active_deactive');
        Route::get('settings/user/deactivate/{id}', 'Settings\\UserController@deactivate');
        Route::post('settings/user/status_change/{id}', 'Settings\\UserController@status_change');
        Route::get('settings/user/activate/{id}', 'Settings\\UserController@activate');
        Route::post('settings/user/status_activate/{id}', 'Settings\\UserController@status_activate');
        Route::resource('settings/user', 'Settings\\UserController');

        
        Route::get('problem_request', 'ProblemRequestController@index');
        Route::get('problem_request/{id}', 'ProblemRequestController@show')->where('id', '[0-9]+');
        Route::get('/search', 'SearchController@search');
        Route::get('/problem_request/mis', 'ProblemRequestController@misindex');
        Route::get('/problem_request/ais', 'ProblemRequestController@aisindex');
        Route::get('/problem_request/regular_activity', 'ProblemRequestController@regularindex');
        Route::get('/problem_request/others', 'ProblemRequestController@othersindex');


        /*
         * ************************************************
         * Ajax middlerware
         * *************************************************
         */
        Route::group(['middleware' => 'ajax'], function () {
            Route::post('ajax/show-zone', 'AjaxController@showZone');
            Route::post('ajax/show-branch', 'AjaxController@showBranch');
            Route::post('ajax/assign-by', 'AjaxController@assignBy');
            Route::post('ajax/make-success', 'AjaxController@makeSuccess');
            Route::post('ajax/make-cancel', 'AjaxController@makeCancel');
        });
    });

});

















