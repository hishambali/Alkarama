<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StandingsResource extends JsonResource
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
            'win'=> $this->win,
          //  '+/-'=> $this->+/-,
            'lose'=> $this->lose,
            'draw'=> $this->draw,
            'play'=> $this->play,
            'point'=> $this->point,
            'seasone_id'=> $this->seasone_id,
            'club_id'=> $this->club_id,
        ];
    }
}
