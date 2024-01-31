<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TopFanResource;
use App\Models\TopFan;
use Illuminate\Http\Request;

class TopFanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return TopFanResource::collection(TopFan::get());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TopFan  $topFan
     * @return \Illuminate\Http\Response
     */
    public function show(TopFan $topFan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TopFan  $topFan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TopFan $topFan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TopFan  $topFan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TopFan $topFan)
    {
        //
    }
}
