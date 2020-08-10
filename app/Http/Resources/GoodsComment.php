<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GoodsComment extends JsonResource
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
            'content' => $this->content,
            'created_time' => $this->created_at->format("y-m-d H:i:s"),
            'user' =>  $this->user->name,
            'pictures' => $this->pictures,
        ];
    }
}
