<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display's a listing of all the users on
     * the database
     *
     * @return mixed
     */
    public function index()
    {
        $users = User::all();

        return UserResource::collection($users);
    }

    /**
     * Display's a user's details together with
     * a button that simulates swiping out
     * of a station.
     *
     *
     * @param $id
     * @return UserResource
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return new UserResource($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return UserResource
     */
    public function store(Request $request)
    {
        $user = $request->isMethod('put') ? User::findOrFail($request->user_id) : new User;
        $user->journey_id = $request->input('journey_id');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->password);
        $user->address = $request->input('address');
        $user->home_phone = $request->input('home_phone');
        $user->mobile_phone = $request->input('mobile_phone');
        $user->balance = $request->input('balance');

        if ($user->save()) {
            return new UserResource($user);
        }
    }

    /**
     * Update a user
     *
     * @param $id
     * @return UserResource
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->fill($request->only(['balance']));

        if ($user->save()) {
            return new UserResource($user);
        }
    }

    /**
     * Delete a user
     *
     * @param $id
     * @return UserResource
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->delete()) {
            return new UserResource($user);
        }
    }
}
