<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrimeResource;
use App\Models\Prime;
use Illuminate\Http\Request;

class PrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return PrimeResource::collection(Prime::get());

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
     * @param  \App\Models\Prime  $prime
     * @return \Illuminate\Http\Response
     */
    public function show(Prime $prime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prime  $prime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prime $prime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prime  $prime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prime $prime)
    {
        //
    }
}
