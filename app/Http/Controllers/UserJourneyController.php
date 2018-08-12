<?php

namespace App\Http\Controllers;

use App\Http\Resources\JourneyCollection;
use App\Http\Resources\JourneyResource;
use App\Journey;
use Illuminate\Http\Request;

class UserJourneyController extends Controller
{
    /**
     * Display's a listing of all the journeys
     * and the card associated with those journeys.
     *
     *
     * @return mixed
     */
    public function index()
    {
        $journeys = Journey::with('user')->get();

        return new JourneyCollection($journeys);
    }

    /**
     * Display's user details together with
     * a button that simulates swiping out
     * of a station.
     *
     *
     * @param $id
     * @return JourneyResource
     */
    public function show($id)
    {
        $journey = Journey::findOrFail($id);

        return new JourneyResource($journey);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return JourneyResource
     */
    public function store(Request $request)
    {
        $journey = $request->isMethod('put') ? Journey::findOrFail($request->journey_id) : new Journey;
        $journey->user_id = $request->input('user_id');
        $journey->from = $request->input('from');
        $journey->startingCity = $request->input('startingCity');
        $journey->to = $request->input('to');
        $journey->endingCity = $request->input('endingCity');
        $journey->description = $request->input('description');
        $journey->type = $request->input('type');
        $journey->passengerType = $request->input('passengerType');
        $journey->mode = $request->input('mode');
        $journey->endingFare = $request->input('endingFare');
        

        if ($journey->save()) {
            return new JourneyResource($journey);
        }
    }



     /**
     * Update a journey
     *
     * @param $id
     * @return JourneyResource
     */
     public function update(Request $request, $id)
     {
        //  $journey = Journey::findOrFail($id);
 
        //  $journey->fill($request->only(['from']));
        //  $journey->fill($request->only(['to']));
        //  $journey->fill($request->only(['endingCity']));
        //  $journey->fill($request->only(['description']));
        //  $journey->fill($request->only(['type']));
        //  $journey->fill($request->only(['passengerType']));
        //  $journey->fill($request->only(['mode']));
        //  $journey->fill($request->only(['endingFare']));
 
        //  if ($journey->save()) {
        //      return new JourneyResource($journey);
        //  }
     }
}
