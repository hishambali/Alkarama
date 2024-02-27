<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MatchesResource;
use App\Http\Resources\PlanResource;
use App\Http\Resources\ReplacmentResource;
use App\Http\Resources\StatisticResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Club;
use App\Models\Information;
use App\Models\Matches;
use App\Models\Plan;
use App\Models\Player;
use App\Models\Replacment;
use App\Models\Seasone;
use App\Models\Statistic;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatchesController extends Controller
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
        return MatchesResource::collection(Matches::get());

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
            'when' => 'required|date',
            'status' => 'required|string',
            'plan' => 'required|string',
            'channel' => 'required|string',
            'round' => 'required|integer',
            'play_ground' => 'required|string',
            'seasone_id' => 'required|string|exists:seasones,uuid',
            'club1_id' =>'required|string|exists:clubs,uuid',
            'club2_id' =>'required|string|exists:clubs,uuid',
        ]);
        
        if ($validatedData->fails()) {
            return $validatedData->errors();
        }
        else {
            $uuid =Str::uuid();
            $club1= Club::where('uuid',$request->club1_id)->first();
            $club2= Club::where('uuid',$request->club2_id)->first();
            $season= Seasone::where('uuid',$request->seasone_id)->first();
            $data = [
                'uuid'=> $uuid,
                'when'=> $request->when,
                'status'=> $request->status,
                'plan' => $request->plan,
                'channel' =>$request->channel,
                'round' =>$request->round,
                'play_ground' =>$request->play_ground,
                'seasone_id'=> $season->id ,
                'club1_id'=> $club1->id,
                'club2_id'=> $club2->id,
            ];
           try {
            Matches::create($data);
            return $this->apiResponse($data);
           } catch (\Throwable $th) {
            throw $th;
           }
            
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matches  $matches
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        //
        return MatchesResource::make(Matches::where("uuid",$uuid)->first());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matches  $matches
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matches $matches)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matches  $matches
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matches $matches)
    {
        //
    }
    public function nxt3matchs() {
        try {
            $livematch= Matches::where('status','finished')->orderBy("updated_at",'desc')->first();
              
            if ($livematch != null) {
                # code...
                $match = MatchesResource::make(Matches::where('id',$livematch->id)->first());
                $livematch = StatisticResource::make(Statistic::where('match_id',$livematch->id)->first());
            }
            $now = Carbon::now()->format('Y-m-d-h');
            $nextmatch= Matches::where('when','>=',$now)->limit(2)->get();
            $va1= json_decode($livematch->value,true);
            $va2= json_decode($livematch->value,true);
            $data = [
                'matches' => MatchesResource::collection($nextmatch),
                
                'finished' =>[
                    'value_club1'=>  $va1["score1"],
                    'value_club2'=>  $va2["score2"],
                    'match_uuid'=> $match->uuid,
                    'match_when'=> $match->when,
                    'match_play_ground'=> $match->play_ground,
                    'match_club1_name'=> $match->club1->name,
                    'match_club2_name'=> $match->club2->name,
                    'match_logoclub1'=> $match->club1->logo ,
                    'match_logoclub2'=> $match->club2->logo ,
                ],
            ];
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            throw $th;
         //   return $this->errorResponse($th->getMessage(),404);
        }
    }
    public function home() {
        $player = Player::inRandomOrder()->first();
        $now = Carbon::now()->format('Y-m-d-h');
        $nextmatch= Matches::where('when','>=',$now)->limit(3)->get();
       
        $lastnews= Information::where('type','News')->get();
        $data = [
            'player'=>$player->image,
            'matches'=>$nextmatch,
            'lastnews'=>$lastnews,
            
        ];
        return $this->apiResponse($data);
    }
    public function MatchDetails()
    {
        try {
            $detail = StatisticResource::make(Statistic::first());
            $match = MatchesResource::make(Matches::first());
            $match_id = Matches::where('uuid',$match->uuid)->first()->id;
           $replace = ReplacmentResource::collection(Replacment::where('match_id', $match_id)->get());
           $plan = PlanResource::collection(Plan::where('match_id', $match_id)->where('status','main')->get());
            $beanch = PlanResource::collection(Plan::where('match_id', $match_id)->where('status','beanch')->get());
            $date = [
                'detail'=> $detail,
                'match'=> $match,
               'replace' => $replace,
               'plan' => $plan,
               'beanch' =>$beanch,
            ];

            return $this->apiResponse($date,true,null,200);
            }  
        catch (\Exception $e) {
            return $this->apiResponse(null, false, $e->getMessage(), $e->getCode());
        }
    }
}
