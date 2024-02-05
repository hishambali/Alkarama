<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AssociationResource;
use App\Http\Traits\FileUploader;
use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AssociationController extends Controller
{
use FileUploader;    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return AssociationResource::collection(Association::get());

        
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
            'boss' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|',
            'country' => 'required|string|',
            'sport_id' => 'required|string|exists:sports,id',
            
        ]);
        
            if ($validatedData->fails()) {
                return $validatedData->errors();
            }
            else {
                $sport = Association::where("boss",$request->boss)->first();

                if ($sport == true) {
                    dd("This Association is already exists");
                    # code...
                }
                else{
                    $uuid = Str::uuid();
                    $date =[
                        'boss'=>$request->boss,
                        'description'=>$request->description,
                        'country'=>$request->country,
                        'image'=> $this->uploadFile($request,$request->boss,"Association"),
                        'uuid'=>$uuid, 
                        'sport_id'=>$request->sport_id, 
                    ];
                    if (Association::create($date)) 
                    {
                        return $date;
                        
                    }                   
                }
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Association  $association
     * @return \Illuminate\Http\Response
     */
    public function show(Association $association)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Association  $association
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Association $association)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Association  $association
     * @return \Illuminate\Http\Response
     */
    public function destroy(Association $association)
    {
        //
    }
}
