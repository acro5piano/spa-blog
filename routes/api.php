<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'api'], function () {
    Route::post('authenticate',  'AuthenticateController@authenticate');
    Route::get('users',  'AuthenticateController@getUsers');

    Route::get('logout',  'AuthenticateController@logout')->middleware('jwt.refresh');

    Route::resource('articles',  'ArticleController', ['only' => [
        'index', 'show'
    ]]);

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::resource('articles',  'ArticleController', ['only' => [
            'store', 'update',  'destroy'
        ]]);

        Route::get('me',  'AuthenticateController@getCurrentUser');
        Route::get('home',  'WelcomeController@index');
    });
});
