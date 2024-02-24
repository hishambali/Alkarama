<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClubResource;
use App\Http\Traits\FileUploader;
use App\Http\Traits\GeneralTrait;
use App\Models\Club;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClubController extends Controller
{
    use FileUploader;
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
       return ClubResource::collection(Club::get());
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
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string|',
            'sport_id' => 'required|string|exists:sports,id',
            
        ]);
        if ($validatedData->fails()) {
            return $validatedData->errors();
        }
        else {
            $sport = Club::where("name",$request->name)->where('sport_id',"=",$request->sport_id)->first();

            if ($sport == true) {
                dd("This Club is already exists");
                return $this->apiResponse(null,false,"This Club is already exists",402);
            }
            else{
                $uuid = Str::uuid();
                $data =[
                    'name'=>$request->name,
                    'address'=>$request->address,
                    'logo'=> $this->uploadFile($request,$request->name.$request->sport_id,"Club","logo"),
                    'uuid'=>$uuid, 
                    'sport_id'=>$request->sport_id, 
                ];
                if (Club::create($data)) 
                {
                    return $this->apiResponse($data,true,null,200);
                    
                }                   
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        //
        return ClubResource::make(Club::where("uuid",$uuid)->first());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        //
    }
}
