<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::resource('user','UserController')->middleware('auth:api');
Route::resource('job','JobController')->middleware('auth:api');
Route::resource('portfolio','PortfolioController')->middleware('auth:api');
Route::resource('feedback','FeedbackController')->middleware('auth:api');
Route::get('jobs/subcat/{subcat}','JobController@jobBySubCat')->middleware('auth:api');
Route::get('jobs/ratingTop','JobController@jobByRatingTop')->middleware('auth:api');
Route::get('jobs/recent','JobController@latestJobs')->middleware('auth:api');
Route::get('jobs/search','JobController@search')->middleware('auth:api');
Route::get('search','SearchController@search')->middleware('auth:api');

