<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClubResource extends JsonResource
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
            'logo'=> $this->logo,
            'AddressOfClub'=> $this->address,
            'SportName'=>$this->sport->name,
        ];
    }
}
