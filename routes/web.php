<?php

Route::get('/','ProductController@index');
Route::post('/add-to-cart','ProductController@addToCart');
Route::get('/view-cart','ProductController@viewCart');
Route::post('/edit-cart','ProductController@editCart');
