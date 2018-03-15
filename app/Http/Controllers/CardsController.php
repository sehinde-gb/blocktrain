<?php

namespace App\Http\Controllers;

use App\Card;
use App\Http\Requests\CardRequest;
use App\Http\Requests\DetailsRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CardsController extends Controller
{

    /**
     * @var User
     */
    public $user;

    /**
     * BlogsController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }


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
     * Display the form for creating
     * a Card
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
     * @param CardRequest $request
     * @param Card $card
     * @return void
     */
    public function store(CardRequest $request, Card $card)
    {

        $this->createCard($request, $card);


        //return redirect('/admin/blogs');
    }


    /**
     * Assign the results of the PostRequest and assign
     * the user_id to publish the post.
     *
     * @param CardRequest $request
     * @return mixed
     */
    protected function createCard(CardRequest $request)
    {

        $user = Auth::user();

        $card = $user->cards()->create($request->all());

        return $card;
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
        $user = Auth::user();

        $card = $user->cards()->update(request()->input());
        //$card->update(request()->input());

        //dd($request);

        return view('cards.thankyou', compact('card'));



    }
}
