<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/// Prefix Using Manage To Handle Api To Manage

Route::group([
    'middleware' => ['api', 'jwt.verify', 'jwt.checkAuth'],
    'prefix' => 'manage',
    'namespace' => 'Manage'
], function () {

    Route::post('info', 'manageController@info');

    Route::post('check', 'manageController@checkAuth');

    Route::post('logout', 'manageController@logout');

    /// Curd Adding

    /// [Doctors]

    Route::post('doctor', 'manageController@addDoctor');

    Route::get('doctor/{id}', 'manageController@getDoctor');

    Route::delete('doctor/{id}', 'manageController@deleteDoctor');

    Route::put('doctor/{id}/edit', 'manageController@updateDoctor');

    /// [Lectures]

    Route::post('instructor', 'manageController@addInstructor');

    Route::get('instructor/{id}', 'manageController@getInstructor');

    Route::delete('instructor/{id}', 'manageController@deleteInstructor');

    Route::put('instructor/{id}/edit', 'manageController@updateInstructor');

    /// [Affairs]

    Route::post('affairs', 'manageController@addAffair');

    Route::get('affairs/{id}', 'manageController@getAffair');

    Route::delete('affairs/{id}', 'manageController@deleteAffairs');

    Route::put('affairs/{id}/edit', 'manageController@updateAffairs');

    /// [Students]

    Route::post('student', 'manageController@addStudent');

    Route::post('import_student', 'manageController@importStudents');

    Route::get('student/{id}', 'manageController@getStudents');

    Route::delete('student/{id}', 'manageController@deleteStudents');

    Route::put('student/{id}/edit', 'manageController@updateStudents');

    /// [Subjects]

    Route::post('subject', 'manageController@AddSubjects');

    Route::get('subject/{id}', 'manageController@getSubjects');

    Route::delete('subject/{id}', 'manageController@deleteSubjects');

    Route::put('subject/{id}/edit', 'manageController@updateSubjects');

    ///[Settings]

    Route::post('settings', 'manageController@updateSettings');
});
