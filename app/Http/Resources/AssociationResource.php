<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssociationResource extends JsonResource
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
            'boss'=> $this->boss,
            'image'=> $this->image,
            'description'=> $this->description,
            'country' =>$this->country,
            'sport_name' => $this->sport->name,
        ];
    }
}
