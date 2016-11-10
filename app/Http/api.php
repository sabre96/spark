<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register the API routes for your application as
| the routes are automatically authenticated using the API guard and
| loaded automatically by this application's RouteServiceProvider.
|
*/

Route::group(['prefix' => 'api'], function () {
    Route::get('/tasks', 'API\TaskController@all');
    Route::post('/task', 'API\TaskController@store');
    Route::delete('/task/{task}', 'API\TaskController@destroy');

    Route::get('/activity', 'API\ActivityController@all');
});
