<?php

namespace App\Http\Controllers;

use App\Card;
use App\Http\Requests\CardRequest;
use Illuminate\Http\Request;


class CardsController extends Controller
{
    /**
     * Display's a listing of all the cards on
     * the database.
     *
     * Clicking on a ticket swipes that ticket in to
     * a hard coded station.
     *
     * @return mixed
     */
    public function index()
    {

        $cards = Card::all();

        return view('cards.index', compact('cards'));
    }


    /**
     * Display's a card details together with
     * a button that simulates swiping out
     * of a station.
     *
     *
     * @param Card $card
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Card $card)
    {

        return view('cards.show', compact('card'));

    }

    /**
     * Passenger enters the destination station this simulates
     * the swipe out of a station.
     *
     *
     * @param Card $card
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Card $card)
    {

        return view('cards.edit', compact('card'));
    }


    /**
     * Update the card with the destination station.
     *
     * @param CardRequest $request
     * @param Card $card
     * @return void
     *
     */
    public function update(CardRequest $request, Card $card)
    {

        $card->update(request()->input());


        return view('cards.thankyou', compact('card'));



    }
}
