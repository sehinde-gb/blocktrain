<?php

namespace App\Http\Controllers;

use App\Card;
use App\Http\Requests\JourneyRequest;
use App\Http\Resources\JourneyCollection;
use App\Journey;
use App\Http\Resources\Journey as JourneyResource;




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
     * @param JourneyRequest $request
     *
     * @return void
     */
    public function store(JourneyRequest $request)
    {
        //$user = Auth::user();

        $journey = $request->isMethod('put') ? Journey::findOrFail
        ($request->journey_id) : new Journey;

        $journey->id = $request->input('journey_id');
        $journey->start = $request->input('start');
        $journey->station = $request->input('station');
        $journey->discount = $request->input('discounts');
        $journey->cost = $request->input('cost');

        //if($journey->save()) {
          //  return new JourneyResource($journey);
        //}
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
