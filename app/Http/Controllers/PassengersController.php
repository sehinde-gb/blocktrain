<?php

namespace App\Http\Controllers;

use App\Passenger;
use Illuminate\Http\Request;


class PassengersController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return Passenger::latest()->get();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            //'body' => 'required|max:500'
        ]);

        return Passenger::create([ 'body' => request('body') ]);
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        $task = Passenger::findOrFail($id);
        $task->delete();
        return 204;
    }
}
