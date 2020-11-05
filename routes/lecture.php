<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/// Prefix Using Lecture To Handle Api To Lecture

Route::group([
    'middleware' => ['api', 'jwt.verify', 'jwt.checkAuth'],
    'prefix' => 'lecture',
    'namespace' => 'Lecture'
], function () {

    Route::post('info', 'lectureController@info');

    Route::post('check', 'lectureController@checkAuth');

    Route::post('logout', 'lectureController@logout');

    ///Create Or Update Marks

    Route::post('marks', 'lectureController@addMarks');

    Route::get('marks/{id}', 'lectureController@getMarks');

    /// Sections Students

    Route::get('students/{id}', 'lectureController@getStudents');

    ///[Settings]

    Route::post('settings', 'lectureController@updateSettings');
});
