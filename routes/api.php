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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['namespace' => 'Api\V1', 'prefix' => 'v1'], function() {
    Route::get('team/{id}/members', 'TeamController@members')
        ->where('id', '^[0-9]+$')
        ->middleware('api');
    Route::post('team/{id}/document', 'DocumentController@create')
        ->where('id', '^[0-9]+$')
        ->middleware('api');
    Route::put('team/{id}/document', 'DocumentController@update')
        ->where('id', '^[0-9]+$')
        ->middleware('api');
    Route::delete('team/{id}/document', 'DocumentController@delete')
        ->where('id', '^[0-9]+$')
        ->middleware('api');
});
