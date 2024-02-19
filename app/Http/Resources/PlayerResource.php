<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
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
            'name'=> $this->name,
            'high'=> $this->high,
            'play'=> $this->play,
            'number'=> $this->number,
            'age'=> Carbon::parse($this->born)->age,
            'born'=> $this->born,
            'from'=> $this->from,
            'first_club'=> $this->first_club,
            'career'=> $this->career,
            'image'=> $this->image,
            'sport_id'=> $this->sport->name,
        ];
    }
}
