<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SeasoneResource;
use App\Models\Seasone;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validatedData = Validator::make($request->all(),[
            'name' => 'required|string',
            'start_date'=>'required|date|date_format:Y-m-d|after:yesterday' ,
            'end_date'=> "required|date|date_format:Y-m-d|after:start_date",
            
        ]);
        
            if ($validatedData->fails()) {
                return $validatedData->errors();
            }
            else {
                $uuid = Str::uuid();
                $data = [
                  'name'=>$request->name,  
                  'start_date'=>$request->start_date,  
                  'end_date'=>$request->end_date,
                  'uuid'=>$uuid,
                ];
            }
            if (Seasone::create($data)) {
                return $data;
            }
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
