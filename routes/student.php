<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/// Prefix Using Student To Handle Api To Student

Route::group([
    'middleware' => ['api', 'jwt.verify', 'jwt.checkAuth'],
    'prefix' => 'student',
    'namespace' => 'Student'
], function () {

    Route::post('info', 'studentController@info');

    Route::post('check', 'studentController@checkAuth');

    Route::post('logout', 'studentController@logout');
});
