<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TopFanResource;
use App\Models\TopFan;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validatedData = Validator::make($request->all(),[
            'name' => 'required|string',
            'association_id' => 'required|string|exists:associations,id',
            
        ]);
        
            if ($validatedData->fails()) {
                return $validatedData->errors();
            }
            else {
                $sport = TopFan::where("name",$request->name)->first();

                if ($sport == true) {
                    dd("This Fan is already exists");
                    # code...
                }
                else{
                    $uuid = Str::uuid();
                    $date =[
                        'name'=>$request->name,
                        'uuid'=>$uuid, 
                        'association_id'=>$request->association_id, 
                    ];
                    if (TopFan::create($date)) 
                    {
                        return $date;
                        
                    }                   
                }
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TopFan  $topFan
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        //
        
       return TopFanResource::make(TopFan::where("uuid",$uuid)->first());

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
