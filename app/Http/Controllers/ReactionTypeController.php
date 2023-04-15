<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReactionTypeRequest;
use App\Http\Requests\UpdateReactionTypeRequest;
use App\Models\ReactionType;

class ReactionTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreReactionTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReactionTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReactionType  $reactionType
     * @return \Illuminate\Http\Response
     */
    public function show(ReactionType $reactionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReactionType  $reactionType
     * @return \Illuminate\Http\Response
     */
    public function edit(ReactionType $reactionType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReactionTypeRequest  $request
     * @param  \App\Models\ReactionType  $reactionType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReactionTypeRequest $request, ReactionType $reactionType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReactionType  $reactionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReactionType $reactionType)
    {
        //
    }
}
