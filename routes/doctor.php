<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/// Prefix Using Manage To Doctor Api To Doctor

Route::group([
    'middleware' => ['api', 'jwt.verify', 'jwt.checkAuth'],
    'prefix' => 'doctor',
    'namespace' => 'Doctor'
], function () {

    Route::post('info', 'doctorController@info');

    Route::post('logout', 'doctorController@logout');

    Route::post('check', 'doctorController@checkAuth');

    /// Curd Adding

    /// Courses

    Route::post('course', 'doctorController@addCourse');

    Route::get('course/{id}', 'doctorController@getCourse');

    Route::delete('course/{id}', 'doctorController@deleteCourse');

    Route::put('course/{id}/edit', 'doctorController@updateCourse');

    //// Section

    Route::post('section', 'doctorController@addSection');

    Route::get('section/{year}/{instructor}', 'doctorController@getSection');

    Route::delete('section/{id}', 'doctorController@deleteSection');

    ///[Settings]

    Route::post('settings', 'doctorController@updateSettings');
});
