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




//Route::middleware(['auth:api'])->get('/user', function (Request $request) {
  //  return $request->user();
//});



//Route::resource('journeys', 'JourneyController');



    Route::apiResource('cards', 'CardController');

    Route::apiResource('card.journey', 'CardJourneyController')->except([
        'update', 'destroy'
    ]);

    Route::post('auth/register', 'AuthController@register');

    Route::group(['prefix' => 'auth'], function ($router) {
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });










