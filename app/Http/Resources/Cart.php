<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cart extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
       return [
           'id' => $this->id,
           'quantity' => $this->quantity,
           'goods_id' => $this->goods_id,
           'goods_name' => $this->goods->name,
           'subtitle' => $this->goods->subtitle,
           'cover' => $this->goods->goods_cover,
           'price' => $this->goods->price,
           'created_at' => $this->created_at->format("Y-m-d H:i:s")
       ];
    }
}
