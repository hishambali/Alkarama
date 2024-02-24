<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AssociationResource;
use App\Http\Resources\TopFanResource;
use App\Http\Resources\VideoResource;
use App\Http\Traits\FileUploader;
use App\Http\Traits\GeneralTrait;
use App\Models\Association;
use App\Models\Sport;
use App\Models\TopFan;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class AssociationController extends Controller
{
use FileUploader;
use GeneralTrait;    /**
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
            'sport_id' => 'required|string|exists:sports,uuid',
            
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
                    $sportid= Sport::where('uuid',$request->sport_id)->first();
                    $date =[
                        'boss'=>$request->boss,
                        'description'=>$request->description,
                        'country'=>$request->country,
                        'image'=> $this->uploadFile($request,$request->boss,"Association"),
                        'uuid'=>$uuid, 
                        'sport_id'=> $sportid->id, 
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
    public function show($uuid)
    {
        //
        return AssociationResource::make(Association::where("uuid",$uuid)->first());

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
    public function associationtopfan(Association $association) {
        $Boss = AssociationResource::make(Association::first())->boss;
        $About = AssociationResource::make($association->first())->description;
        $Members = TopFanResource::collection(TopFan::where('association_id',$association->first()->id)->get());
        $video = VideoResource::collection(Video::where());
        $data = [
            'Boss' => $Boss,
            'About' => $About,
            'Members' => $Members
        ];
    return $this->apiResponse($data,true,null,200);
    }
}
