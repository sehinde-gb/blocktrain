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




Route::middleware(['auth:api', 'cors'])->get('/user', function (Request $request) {
    return $request->user();
});


    Route::middleware('cors')->group(function(){
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


// List cards
        Route::get('cards', 'CardsController@index');

// List single journey
        Route::get('card/{id}', 'CardsController@show');

// Create new journey
        Route::post('card', 'CardsController@store');

// Update journey
        Route::put('card', 'CardsController@update');

// Delete journey
        Route::delete('card/{id}', 'CardsController@destroy');

    });


