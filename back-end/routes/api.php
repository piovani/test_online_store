<?php

Route::post('auth', 'Domain\Auth\AuthController@authenticate');

Route::get('/category', 'Domain\Category\CategoryController@index');
Route::get('/product/home', 'Domain\Product\ProductController@home');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::resource('/product', 'Domain\Product\ProductController')->except('edit', 'create');
    Route::post('/import-product', 'Domain\Product\ProductController@processFile');
});
