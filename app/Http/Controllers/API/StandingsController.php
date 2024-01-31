<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\StandingsResource;
use App\Models\Standings;
use Illuminate\Http\Request;

class StandingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return StandingsResource::collection(Standings::get());

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
     * @param  \App\Models\Standings  $standings
     * @return \Illuminate\Http\Response
     */
    public function show(Standings $standings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Standings  $standings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Standings $standings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Standings  $standings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Standings $standings)
    {
        //
    }
}
