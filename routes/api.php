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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('user','UserController');
Route::resource('job','JobController');
Route::get('jobs/{subcat}','JobController@jobBySubCat');
Route::get('jobs/get/ratingTop','JobController@jobByRatingTop');
Route::get('jobs/get/recent','JobController@latestJobs');
