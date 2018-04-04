<?php

Route::get('/', 'FriendController@search');
Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');

//Invokes friendcontoller class @ app/http/controllers/FriendController.php
Route::get('/friends', 'FriendController@index');
Route::get('/friends/search', 'FriendController@search');
Route::get('/friends/create', 'FriendController@create');
Route::post('/friends/', 'FriendController@store');
Route::get('/friends/{location}', 'FriendController@show');


/**
 * Practice
 */
Route::any('/practice/{n?}', 'PracticeController@index');


