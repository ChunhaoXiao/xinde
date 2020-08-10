<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Address extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'full_address' => $this->full_address,
            'name' => $this->consignee,
            'mobile' => $this->mobile,
            
        ];
    }
}
