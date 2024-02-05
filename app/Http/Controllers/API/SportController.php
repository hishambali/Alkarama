<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SportResource;
use App\Models\Sport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return SportResource::collection(Sport::get());
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
            'image' => 'required|image|',
            
        ]);
        
            if ($validatedData->fails()) {
                return $validatedData->errors();
            }
            else {
                $sport = Sport::where("name",$request->name)->first();

                if ($sport == true) {
                    dd("This Sport is already exists");
                    # code...
                }
                else{
                    $date =[
                        'name'=>$request->name,
                        'image'=>$request->image,
                        'uuid'=>Str::uuid()->toString(),
                        
                    ];
                    if (Sport::create($date)) 
                    {
                        return $date;
                        
                    }                   
                }
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        //
        return SportResource::make( Sport::where("uuid",$uuid)->first());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sport $sport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {
        //
    }
}
