<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserFriendRequest;
use App\Http\Requests\UpdateUserFriendRequest;
use App\Models\UserFriend;

class UserFriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserFriendRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserFriendRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserFriend  $userFriend
     * @return \Illuminate\Http\Response
     */
    public function show(UserFriend $userFriend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserFriend  $userFriend
     * @return \Illuminate\Http\Response
     */
    public function edit(UserFriend $userFriend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserFriendRequest  $request
     * @param  \App\Models\UserFriend  $userFriend
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserFriendRequest $request, UserFriend $userFriend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserFriend  $userFriend
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserFriend $userFriend)
    {
        //
    }
}
