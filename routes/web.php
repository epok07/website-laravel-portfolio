<?php

// Authentication routes
Auth::routes();

// Home
Route::get('/', 'LandingController@index')->name('home');

// CV
Route::get('/cv', 'CvController@index')->name('cv.index');
Route::get('/cv/{name}', 'CvController@show')->name('cv.show');
