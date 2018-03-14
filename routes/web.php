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

Route::resource('cards', 'CardsController');

Route::get('/dashboard' , function () {

    return view('dashboard');

});

#Static
//Route::get('/swipein', ['as' => 'swipein', 'uses' => 'SwipesController@swipeIn']);
Route::get('swipe/{id}', function ($id) {
        return 'Card '.$id;
})->name('swipein');

Route::get('/swipeout', ['as' => 'swipeout', 'uses' => 'SwipesController@swipeOut']);