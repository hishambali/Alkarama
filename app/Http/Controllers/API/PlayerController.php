<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlayerResource;
use App\Http\Traits\FileUploader;
use App\Http\Traits\GeneralTrait;
use App\Models\Player;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
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
        return PlayerResource::collection(Player::get());

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
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',           
            'high' => 'required|integer',
            'play' => 'required|string',
            'number' => 'required|integer',
            'born' => 'required|date',
            'from' => 'required|string',
            'first_club' => 'required|string',
            'career' => 'required|string',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000', // max size in kilobytes
            'sport_id' => 'required|string|exists:sports,uuid',
        ]);

        // If the validation fails, return the error response
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $uuid = Str::uuid();
                    $sportid= Sport::where('uuid',$request->sport_id)->first();
                    $data =[
                        'name'=>$request->name,
                        'play'=>$request->play,
                        'from'=>$request->from,
                        'born'=>$request->born,
                        'high'=>$request->high,
                        'number'=>$request->number,
                        'first_club'=>$request->first_club,
                        'career'=>$request->career,
                        'image'=> $this->uploadFile($request,$request->name,"Player"),
                        'uuid'=>$uuid, 
                        'sport_id'=> $sportid->id, 
                    ];
                    if ($player =Player::create($data)) 
                    {

                        return $this->apiResponse($player);
                        
                    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        //
        return PlayerResource::make( Player::where("uuid",$uuid)->first());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }
}
