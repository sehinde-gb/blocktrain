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

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

Auth::routes();

Route::get('/home', function () {
    return view('home');

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


/*Route::get('passengers', function() {
    return ['Clive', 'Jason', 'Sam', 'Harry', 'Osman'];
});*/


