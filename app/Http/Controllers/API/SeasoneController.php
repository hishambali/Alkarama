<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SeasoneResource;
use App\Models\Seasone;
use Illuminate\Http\Request;

class SeasoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return SeasoneResource::collection(Seasone::get());

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
     * @param  \App\Models\Seasone  $seasone
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        //
        return SeasoneResource::make(Seasone::where("uuid",$uuid)->first());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seasone  $seasone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seasone $seasone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seasone  $seasone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seasone $seasone)
    {
        //
    }
}
