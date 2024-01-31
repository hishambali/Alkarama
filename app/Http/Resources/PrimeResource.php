<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrimeResource extends JsonResource
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
        'description'=> $this->description,  
        'image'=> $this->image,
        'type'=> $this->type,  
        'seasone_id'=> $this->seasone_id,  
        'sport_id'=> $this->sport_id,  
        ];
    }
}
