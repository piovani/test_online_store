<?php

Route::post('auth', 'Domain\Auth\AuthController@authenticate');
Route::post('auth-refresh', 'V1\Auth\AuthController@refresh');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('/category', 'Domain\Category\CategoryController@index');
    Route::resource('/product', 'Domain\Product\ProductController')->except('edit', 'create');
});
