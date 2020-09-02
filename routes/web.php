<?php

Auth::routes();

//Sign Up Routes
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('users/{user}/notification','NotificationController@index');
Route::get('users/{user}/about','ProfileController@index');
Route::get('users/{user}/about/edit','ProfileController@edit');
Route::get('users/{user}/groups','GroupsController@index');
Route::get('users/{user}/chats','ChatsController@index');


Route::group(['middleware' => 'auth'], function (){
    Route::get('/','Users\\NewsfeedsController@index');
        Route::post('/','Users\\NewsfeedsController@store')->name('users.newsfeeds.store');
    Route::resource('users','Users\\UsersController');
    Route::resource('users/{user}/education-details','Users\\UserEducationController')->except('index');
    Route::resource('users/{user}/company-details','Users\\UserCompanyController')->except('index');
    Route::resource('users/{user}/links','Users\\UserLinkController')->except('index');
    Route::resource('users/{user}/tags','Users\\UserTagController')->except('index');
});
