<?php

Route::group(['prefix' => 'auth'], function () {
    Auth::routes();
});

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
