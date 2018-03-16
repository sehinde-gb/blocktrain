<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/home', function () {
    return view('home');

});

    Route::get('/', function () {
        return view('test');

    });


//Route::get('/', function () {
  //  return view('passenger');
    /*$client = new Client(); //GuzzleHttp\Client
    $result = $client->post('http://localhost:3000/api/org.blocktrain.model.Passenger', [
        'form_params' => [
            'passengerId' => '5',
            'firstName' => 'Hannab',
            'lastName' => 'Gordon',
            'email' => 'gordon@gmail.com'
        ]
    ]);*/

//});

Route::resource('cards', 'CardsController');

Route::prefix('api')->group(function() {
  Route::resource('journeys', 'JourneysController');
});


//Route::middleware('auth:api')->group( function () {
  //Route::resource('journeys', 'API\JourneysController');
//});

    Route::get('/dashboard' , function () {

    return view('dashboard');

});

#Static



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
