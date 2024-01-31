<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClothesResource extends JsonResource
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
           'image'=> $this->image,
           'seasone_name'=> $this->seasone->name,
           'sport_name'=> $this->sport->name,
        ];;
    }
}
