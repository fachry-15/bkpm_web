<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Backend'], function () {
	Route::get('api_pendidikan', 'ApiPendidikanController@getAll');
	Route::get('api_pendidikan/{id}', 'ApiPendidikanController@getPen');
	Route::post('api_pendidikan', 'ApiPendidikanController@createPen');
	Route::put('api_pendidikan/{id}', 'ApiPendidikanController@updatePen');
	Route::delete('api_pendidikan/{id}', 'ApiPendidikanController@deletePen');
});
