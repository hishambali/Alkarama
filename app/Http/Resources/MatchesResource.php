<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MatchesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
        'uuid'=> $this->uuid,
        'when'=> Carbon::parse($this->when)->format('Y-m-d l h:i A'),
        'status'=> $this->status,
        'plan'=> $this->plan,
        'channel'=> $this->channel,
        'round'=> $this->round,
        'play_ground'=> $this->play_ground,
        'seasone_id'=> $this->seasone->name,
        'club1_name'=> $this->club1->name,
        'logoclub1' => $this->club1->logo,
        'club2_name'=> $this->club2->name,
        'logoclub2' => $this->club2->logo,

        ];
    }
}
