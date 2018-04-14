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

// List end journeys
Route::get('ends', 'EndsController@index');

// List single end journey
Route::get('end/{id}', 'EndsController@show');

// Create new end journey
Route::post('end', 'EndsController@store');

// Update end journey
Route::put('end', 'EndsController@update');

// Delete end journey
Route::delete('end/{id}', 'EndsController@destroy');

// List start journeys
Route::get('starts', 'StartsController@index');

// List single start journey
Route::get('start/{id}', 'StartsController@show');

// Create new start journey
Route::post('start', 'StartsController@store');

// Update start journey
Route::put('start', 'StartsController@update');

// Delete start journey
Route::delete('start/{id}', 'StartsController@destroy');



Route::middleware('cors')->group(function(){



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


