<?php

Route::get('/','ProductController@index');
Route::any('/add-to-cart','ProductController@addToCart');
Route::get('/view-cart','ProductController@viewCart');
Route::get('/session','ProductController@getanother');
