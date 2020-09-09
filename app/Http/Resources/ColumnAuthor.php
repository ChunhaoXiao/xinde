<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ColumnAuthor extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $datas = parent::toArray($request);
        $datas['avatar'] = $this->avatar? asset('storage/'.$this->avatar):'';
        return $datas;
    }
}
