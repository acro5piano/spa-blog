<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'api'], function () {
    Route::get('users',  'Auth\LoginController@getUsers');

    Auth::routes();

    Route::resource('articles',  'ArticleController', ['only' => [
        'index', 'show'
    ]]);

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::resource('articles',  'ArticleController', ['only' => [
            'store', 'update',  'destroy'
        ]]);

        Route::get('me',  'Auth\LoginController@getCurrentUser');
        Route::get('home',  'WelcomeController@index');
    });
});
