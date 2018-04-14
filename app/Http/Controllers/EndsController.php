<?php

namespace App\Http\Controllers;

use App\End;
use Illuminate\Http\Request;
use App\Http\Resources\End as EndResource;


class EndsController extends Controller
{

    /**
     * Display a listing of end journeys
     *
     * @return mixed
     */
    public function index()
    {
        $ends = End::paginate(15);

        return EndResource::collection($ends);

    }

    /**
     * Display the end journey
     *
     * @param $id
     * @return EndResource
     */
    public function show($id)
    {

        $end = End::findOrFail($id);

        return new EndResource($end);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return EndResource
     */
    public function store(Request $request)
    {
        //$user = Auth::user();

        $end = $request->isMethod('put') ? End::findOrFail
        ($request->end_id) : new End;

        $end->id = $request->input('end_id');

        $end->endingCity = $request->input('endingCity');
        $end->endingFare = $request->input('endingFare');
        $end->description = $request->input('description');
        $end->type = $request->input('type');
        $end->passengerType = $request->input('passengerType');
        $end->mode = $request->input('mode');
        //$end->balance = $request->input('balance');

        if($end->save()) {
            return new EndResource($end);
        }
    }

    /**
     * Delete a journey
     *
     * @param $id
     * @return EndResource
     */
    public function destroy($id)
    {

        $end = End::findOrFail($id);

        if($end->delete()) {
            return new EndResource($end);
        }


    }



}
