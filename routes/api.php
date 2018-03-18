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

// List journeys
Route::get('journeys', 'JourneysController@index');

// List single journey
Route::get('journey/{id}', 'JourneysController@show');

// Create new journey
Route::post('journey', 'JourneysController@store');

// Update journey
Route::put('journey', 'JourneysController@update');

// Delete journey
Route::delete('journey/{id}', 'JourneysController@destroy');

