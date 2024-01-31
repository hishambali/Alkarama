<?php

namespace App\Http\Resources;

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
        'when'=> $this->when,
        'status'=> $this->status,
        'plan'=> $this->plan,
        'channel'=> $this->channel,
        'round'=> $this->round,
        'play_ground'=> $this->play_ground,
        'seasone_id'=> $this->seasone->seasone_id,
        'club1_id'=> $this->club->club1_id,
        'club2_id'=> $this->club->club2_id,
        ];
    }
}
