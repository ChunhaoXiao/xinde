<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Advertisement extends JsonResource
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
        if(empty($this->content)) {
            return [];
        }
        return [
            'position' => $this->position->name,
            'mark' => $this->position->mark,
            'content' => $this->content,
            'link' => $this->link,
        ];
    }
}
