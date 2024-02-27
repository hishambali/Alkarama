<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;
use App\Http\Resources\BossResource;
use App\Http\Resources\InformationResource;
use App\Http\Resources\PrimeResource;
use App\Http\Traits\FileUploader;
use App\Http\Traits\GeneralTrait;
use App\Models\About;
use App\Models\Boss;
use App\Models\Information;
use App\Models\Prime;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    use GeneralTrait;
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->apiResponse(AboutResource::collection(About::get()));
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
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string|',            
        ]);
        
            if ($validatedData->fails()) {
                return $validatedData->errors();
            }
            else {
                $sport = About::where("title",$request->title)->first();

                if ($sport == true) {
                    return $this->errorResponse("This About is already exists",422);
                    # code...
                }
                else{
                    $uuid = Str::uuid();
                    $date =[
                        'title'=>$request->title,
                        'content'=>$request->content,
                        'image'=> $this->uploadFile($request,$request->title,"About"),
                        'uuid'=>$uuid, 
                    ];
                    if (About::create($date)) 
                    {
                        return $this->apiResponse($date);
                        
                    }                   
                }
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        //
        return $this->apiResponse(AboutResource::make(About::where('uuid',$uuid)->first()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
    public function Meusiam() {
        try {
            $about = InformationResource::collection(Information::where('type', 'about')->get());
            $stratigy = InformationResource::collection(Information::where('title', 'استراتيجية النادي')->get());
            $boss = BossResource::collection(Boss::orderby('start_year')->get());
            $prime_club = PrimeResource::collection(Prime::where('type', 'club')->orderby('seasone_id')->get());
            $prime_personal = PrimeResource::collection(Prime::where('type', 'personal')->orderby('seasone_id')->get());
            $date = [
                'about'=> $about,
                'stratigy'=> $stratigy,
                'boss'=> $boss,
                'prime_club'=> $prime_club,
                'prime_personal'=> $prime_personal,
            ];

            return $this->apiResponse($date,true,null,200);
            }  
        catch (\Exception $e) {
            return $this->apiResponse(null, false, $e->getMessage(), $e->getCode());
        }
    }
}
