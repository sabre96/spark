<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('spark::welcome');
});
Route::get('/home', function () {
    return view('spark::welcome');
});
Route::get('/customers/add', 'CustomerController@add');
Route::get('/customers/show', 'CustomerController@show');
Route::get('/customers/{customer}/delete', 'CustomerController@delete');
Route::get('/customers/{customer}/more', 'CustomerController@more');
Route::get('/customers/{customer}/edit', 'CustomerController@edit');
Route::post('/customers/store', 'CustomerController@store');
Route::patch('/customers/{customer}/update', 'CustomerController@update');
Route::put('/settings/profile/details', 'ProfileDetailsController@update');
Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{category}', 'CategoryController@show');
Route::get('/categories/{category}/delete', 'CategoryController@delete');
Route::get('/categories/{category}/edit', 'CategoryController@edit');
Route::patch('/categories/{category}/update', 'CategoryController@update');
Route::post('/categories/add', 'CategoryController@store');
Route::get('/skill/{skill}', 'SkillController@show');
Route::get('/skill/{skill}/edit', 'SkillController@edit');
Route::get('/skill/{skill}/delete', 'SkillController@delete');
Route::patch('/skill/{skill}/update', 'SkillController@update');
Route::post('/newskill/{category}', 'SkillController@store');
Route::post('/newcategory_branche/{branche}', 'BrancheCategoryController@store');
Route::get('/branches', 'BrancheController@index');
Route::get('/branche/{branche}', 'BrancheController@show');
Route::post('/newbranche', 'BrancheController@store');