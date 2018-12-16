<?php

Route::post('auth', 'Domain\Auth\AuthController@authenticate');
Route::post('auth-refresh', 'V1\Auth\AuthController@refresh');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('/', function() {
        return 'OLA';
    });
});
