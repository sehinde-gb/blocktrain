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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{any}', 'SpaController@index')->where('any', '.*');




//$http = new GuzzleHttp\Client;
//
//$response = $http->post('http://blocktrain.test/oauth/token', [
//    'form_params' => [
//        'grant_type' => 'password',
//        'client_id' => '2',
//        'client_secret' => 'V3XsTF00jQV3IuNfqDqIwMJZ6bNavnuaabE7rcER',
//        'username' => 'ormrepo@gmail.com',
//        'password' => 'password',
//        'scope' => '',
//    ],
//]);
//
//return json_decode((string) $response->getBody(), true);





/*Route::get('/', function () {
    return view('passenger');
    $client = new Client(); //GuzzleHttp\Client
    $result = $client->post('http://localhost:3000/api/org.blocktrain.model.Passenger', [
        'form_params' => [
            'passengerId' => '5',
            'firstName' => 'Hannab',
            'lastName' => 'Gordon',
            'email' => 'gordon@gmail.com'
        ]
    ]);*/

//}*/









