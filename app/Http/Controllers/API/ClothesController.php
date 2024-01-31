<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClothesResource;
use App\Models\Clothes;
use Illuminate\Http\Request;

class ClothesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ClothesResource::collection(Clothes::get());

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
     * @param  \App\Models\Clothes  $clothes
     * @return \Illuminate\Http\Response
     */
    public function show(Clothes $clothes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clothes  $clothes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clothes $clothes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clothes  $clothes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clothes $clothes)
    {
        //
    }
}
