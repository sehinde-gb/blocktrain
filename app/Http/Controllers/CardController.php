<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use App\Http\Resources\CardResource;


class CardController extends Controller
{

    /**
     * Display's a listing of all the cards on
     * the database and eager load the journeys associated with
     * the card.
     *
     * Clicking on a ticket swipes that ticket in to
     * a hard coded station.
     *
     * @return mixed
     */
    public function index()
    {


        $cards = Card::all();


        return CardResource::collection($cards);

    }


    /**
     * Display's a card details together with
     * a button that simulates swiping out
     * of a station.
     *
     *
     * @param $id
     * @return CardResource
     */
    public function show($id)
    {

        $card = Card::findOrFail($id);

        return new CardResource($card);

    }




    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return CardResource
     */
    public function store(Request $request)
    {

        $card = $request->isMethod('put') ? Card::findOrFail
        ($request->card_id) : new Card;

        $card->id = $request->input('card_id');
        $card->journey_id = 1;
        $card->name  = $request->input('name');
        $card->address = $request->input('address');
        $card->home_phone = $request->input('home_phone');
        $card->mobile_phone = $request->input('mobile_phone');
        $card->email = $request->input('email');

        if($card->save()) {
            return new CardResource($card);
        }
    }


    /**
     * @param $id
     */
    public function edit($id)
    {


    }


    /**
     * Delete a journey
     *
     * @param $id
     * @return CardResource
     */
    public function destroy($id)
    {

        $card = Card::findOrFail($id);

        if($card->delete()) {
            return new CardResource($card);
        }


    }





}
