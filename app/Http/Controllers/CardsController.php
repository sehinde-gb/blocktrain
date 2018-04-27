<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use App\Http\Resources\CardResource as CardResource;



class CardsController extends Controller
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

        $cards = Card::paginate(15);


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
     * Display the form for creating
     * a CardResource
     *
     * @return Response
     * @throws HttpNotFoundException
     */
    public function create()
    {
        return view('cards.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return CardResource
     */
    public function store(Request $request)
    {
        //$user = Auth::user();

        $card = $request->isMethod('put') ? Card::findOrFail
        ($request->card_id) : new Card;

        $card->id = $request->input('card_id');
        $card->from = $request->input('from');
        $card->startingCity = $request->input('startingCity');
        $card->to = $request->input('to');
        $card->endingCity = $request->input('endingCity');
        $card->endingFare = $request->input('endingFare');
        $card->description = $request->input('description');
        $card->type = $request->input('type');
        $card->passengerType = $request->input('passengerType');
        $card->mode = $request->input('mode');
        $card->balance = $request->input('balance');
        $card->current_balance = $request->input('current_balance');
        if($card->save()) {
            return new CardResource($card);
        }
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
