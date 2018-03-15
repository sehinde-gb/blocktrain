<?php

namespace App\Http\Controllers;

use App\Card;
use App\Http\Requests\JourneyRequest;
use App\Http\Utilities\Station;
use App\Journey;
use App\User;
use App\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JourneysController extends Controller
{
    /**
     * @var Card
     */
    /**
     * @var Card|User
     */
    public $user;


    /**
     * JourneysController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display the form for administering
     * a Journey
     *
     * @return Response
     * @throws HttpNotFoundException
     */
    public function create()
    {


        return view('journeys.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param JourneyRequest $request
     *
     * @param Card $card
     * @return void
     */
    public function store(JourneyRequest $request, Card $card)
    {

        $user = Auth::user();
        //$this->createCard($request, $journey, $card);

        $journey = $user->journeys()->create($request->all());

        //return redirect('/admin/blogs');
    }

    public function index()
    {

    }







}
