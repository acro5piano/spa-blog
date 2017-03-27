<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'api'], function () {
    Route::post('authenticate',  'Auth\AuthenticateController@authenticate');
    Route::get('users',  'Auth\AuthenticateController@getUsers');

    Auth::routes();
    Route::get('logout',  'Auth\AuthenticateController@logout')->middleware('jwt.refresh');

    Route::resource('articles',  'ArticleController', ['only' => [
        'index', 'show'
    ]]);

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::resource('articles',  'ArticleController', ['only' => [
            'store', 'update',  'destroy'
        ]]);

        Route::get('me',  'Auth\AuthenticateController@getCurrentUser');
        Route::get('home',  'WelcomeController@index');
    });
});
