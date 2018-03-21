<?php

namespace App\Http\Controllers;


use App\Journey;
use App\Http\Resources\Journey as JourneyResource;
use Illuminate\Http\Request;


class JourneysController extends Controller
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
        $journey->startingCity = $request->input('startingCity');
        $journey->endingCity = $request->input('endingCity');
        $journey->endingFare = $request->input('endingFare');

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
