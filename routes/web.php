<?php

// Authentication routes
// Auth::routes();

// Home (CV)
Route::get('/', 'CvController@index')->name('cv.index');
Route::get('/cv/download', 'CvController@downloadCv')->name('cv.download');


// Apps
Route::get('/projects/{view}', 'ProjectController@index')->name('cv.index');

// Summary Generator
// Route::get('/project/summarizer', 'SummarizerController@index')->name('summarizer.index');
// Route::post('/project/summarizer/submit', 'SummarizerController@submit')->name('summarizer.submit');
