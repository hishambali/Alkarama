<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BossResource;
use App\Http\Resources\ClothesResource;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\StandingsResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Boss;
use App\Models\Clothes;
use App\Models\Player;
use App\Models\Standings;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StandingsController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return StandingsResource::collection(Standings::get());

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
            'win' => 'required|integer|min:1',
            'loss' => 'required|integer|min:0',
            'draw' => 'required|integer|min:0',
            'diff' => 'required|integer|',
            'points' => 'required|integer|min:0',
            'play' => 'required|integer||min:0',
            'seasone_id' => 'required|string|exists:seasones,uuid',
            'club_id' => 'required|string|exists:clubs,id',

            
        ]);
        
            if ($validatedData->fails()) {
                return $validatedData->errors();
            }
            else {
                $uuid = Str::uuid();
                $data =[
                    'uuid'=> $uuid,
                    'win'=> $request->win,
                    'loss'=> $request->loss,
                    'draw'=> $request->draw,
                    'diff'=> $request->diff,
                    'points'=> $request->points,
                    'play'=> $request->play,
                    'seasone_id'=> $this->$request->uuid->seasone(),
                    'club_id'=> $request->club_id,
                ];
            }
            if (Standings::create($data)) 
            {
                return $data;
                
            } 
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Standings  $standings
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        //
        return StandingsResource::make(Standings::where("uuid",$uuid)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Standings  $standings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Standings $standings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Standings  $standings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Standings $standings)
    {
        //
    }
    public function PlayersEmployees() {
        try {
            $Boss = BossResource::make(Boss::orderby('start_year')->first());
            $clothes = ClothesResource::make(Clothes::orderby('seasone_id')->first());
           $goalkeeper = PlayerResource::collection(Player::where('play','GK')->get());
           $defence = PlayerResource::collection(Player::where('play','CB')->orWhere('play','RB')->orWhere('play','LB')->get());
            $middle = PlayerResource::collection(Player::where('play','CM')->orWhere('play','RM')->orWhere('play','LM')->orWhere('play','AM')->orWhere('play','DM')->get());
            $attack = PlayerResource::collection(Player::where('play','CF')->orWhere('play','RW')->orWhere('play','LW')->orWhere('play','SS')->get());
            $date = [
                'Boss'=> $Boss,
               'Clothes'=> $clothes,
                'Goalkeeper'=> $goalkeeper,
                'Defence'=> $defence,
                'Middle'=> $middle,
                'Attack'=> $attack,
            ];

            return $this->apiResponse($date,true,null,200);
            }  
        catch (\Exception $e) {
            return $this->apiResponse(null, false, $e->getMessage(), $e->getCode());
        }
        
        
    }
}
