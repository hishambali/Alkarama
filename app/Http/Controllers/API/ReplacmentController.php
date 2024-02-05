<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReplacmentResource;
use App\Models\Replacment;
use Illuminate\Http\Request;

class ReplacmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ReplacmentResource::collection(Replacment::get());

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
     * @param  \App\Models\Replacment  $replacment
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        //
        return ReplacmentResource::make(Replacment::where("uuid",$uuid)->first());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Replacment  $replacment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Replacment $replacment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Replacment  $replacment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Replacment $replacment)
    {
        //
    }
}
