<?php

// Authentication routes
// Auth::routes();

// Home
Route::get('/', 'LandingController@index')->name('home');

// CV
Route::get('/cv', 'CvController@index')->name('cv.index');

// Apps
Route::get('/app', 'AppController@index')->name('cv.index');

// Summary Generator
Route::get('/app/summarizer', 'SummarizerController@index')->name('summarizer.index');
Route::post('/app/summarizer/submit', 'SummarizerController@submit')->name('summarizer.submit');
