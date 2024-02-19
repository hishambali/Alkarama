<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BossResource;
use App\Http\Resources\ClothesResource;
use App\Http\Resources\InformationResource;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\PrimeResource;
use App\Http\Resources\StandingsResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Boss;
use App\Models\Clothes;
use App\Models\Club;
use App\Models\Information;
use App\Models\Player;
use App\Models\Prime;
use App\Models\Seasone;
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
            'win' => 'required|integer|min:0',
            'lose' => 'required|integer|min:0',
            'draw' => 'required|integer|min:0',
            'diff' => 'required|integer|min:0',
            'play' => 'required|integer||min:0',
            'seasone_id' => 'required|string|exists:seasones,uuid',
            'club_id' => 'required|string|exists:clubs,uuid',

            
        ]);
        
            if ($validatedData->fails()) {
                return $validatedData->errors();
            }
            else {
                $uuid = Str::uuid();
                $club= Club::where('uuid',$request->club_id)->first();
                $season= Seasone::where('uuid',$request->seasone_id)->first();
                $data =[
                    'uuid'=> $uuid,
                    'win' => $request->win,
                    'lose'=> $request->lose,
                    'draw'=> $request->draw,
                    'diff'=> $request->diff,
                    'points'=> ((int)$request->win * (int)3) + ((int)$request->draw * (int)1),
                    'play'=> $request->play,
                    'seasone_id'=> $season->id,
                    'club_id'=> $club->id,
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
