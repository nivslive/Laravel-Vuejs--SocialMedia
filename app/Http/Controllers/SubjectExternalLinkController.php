<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectExternalLinkRequest;
use App\Http\Requests\UpdateSubjectExternalLinkRequest;
use App\Models\SubjectExternalLink;

class SubjectExternalLinkController extends Controller
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
     * @param  \App\Http\Requests\StoreSubjectExternalLinkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectExternalLinkRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubjectExternalLink  $subjectExternalLink
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectExternalLink $subjectExternalLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubjectExternalLink  $subjectExternalLink
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectExternalLink $subjectExternalLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectExternalLinkRequest  $request
     * @param  \App\Models\SubjectExternalLink  $subjectExternalLink
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectExternalLinkRequest $request, SubjectExternalLink $subjectExternalLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubjectExternalLink  $subjectExternalLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectExternalLink $subjectExternalLink)
    {
        //
    }
}
