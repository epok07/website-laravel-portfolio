<?php

// Authentication routes
// Auth::routes();

// Home
Route::get('/', 'LandingController@index')->name('home');

// CV
Route::get('/cv', 'CvController@index')->name('cv.index');

// Apps
Route::get('/app', 'AppController@index')->name('cv.index');

// Thesis Generator
Route::get('/app/thesis', 'ThesisGeneratorController@index')->name('thesis.index');
