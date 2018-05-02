<?php

namespace App\Http\Controllers;


use App\Journey;
use App\Http\Resources\JourneyResource as JourneyResource;
use Illuminate\Http\Request;



class JourneyController extends Controller
{


    /**
     * Display a listing of journeys
     *
     * @return mixed
     */
    public function index()
    {
        $journeys = Journey::paginate(15);

        return JourneyResource::collection($journeys);

    }


    /**
     * Display the journey
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
        //$user = Auth::user();

        $journey = $request->isMethod('put') ? Journey::findOrFail
        ($request->journey_id) : new Journey;

        $journey->id = $request->input('journey_id');
        $journey->card_id = 1;
        $journey->from = $request->input('from');
        $journey->startingCity = $request->input('startingCity');
        $journey->to = $request->input('to');
        $journey->endingCity = $request->input('endingCity');
        $journey->endingFare = $request->input('endingFare');
        $journey->description = $request->input('description');
        $journey->type = $request->input('type');
        $journey->passengerType = $request->input('passengerType');
        $journey->mode = $request->input('mode');
        $journey->balance = $request->input('balance');


        if($journey->save()) {
            return new JourneyResource($journey);
        }
    }

    /**
     * Delete a journey
     *
     * @param $id
     * @return JourneyResource
     */
    public function destroy($id)
    {

        $journey = Journey::findOrFail($id);

        if($journey->delete()) {
            return new JourneyResource($journey);
        }


    }











}
