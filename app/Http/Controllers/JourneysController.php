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
     * @var Journey
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
     * Store a newly created resource in storage.
     *
     * @param JourneyRequest $request
     *
     * @return void
     */
    public function store(JourneyRequest $request)
    {
        //$user = Auth::user();

        $journey = Journey::create($request->all());

        return response()->json($journey, 201);
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return Journey::latest()->get();
    }








}
