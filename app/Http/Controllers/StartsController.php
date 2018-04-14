<?php

namespace App\Http\Controllers;

use App\Start;
use Illuminate\Http\Request;
use App\Http\Resources\Start as StartResource;

class StartsController extends Controller
{

    /**
     * Display a listing of start journeys
     *
     * @return mixed
     */
    public function index()
    {
        $starts = Start::paginate(15);

        return StartResource::collection($starts);

    }

    /**
     * Display the start journey
     *
     * @param $id
     * @return StartResource
     */
    public function show($id)
    {

        $start = Start::findOrFail($id);

        return new StartResource($start);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return StartResource
     */
    public function store(Request $request)
    {
        //$user = Auth::user();

        $start = $request->isMethod('put') ? Start::findOrFail
        ($request->start_id) : new Start;

        $start->id = $request->input('start_id');
        $start->startingCity = $request->input('startingCity');
        $start->from = $request->input('from');

        if($start->save()) {
            return new StartResource($start);
        }
    }

    /**
     * Delete a journey
     *
     * @param $id
     * @return StartResource
     */
    public function destroy($id)
    {

        $start = Start::findOrFail($id);

        if($start->delete()) {
            return new StartResource($start);
        }


    }

}
