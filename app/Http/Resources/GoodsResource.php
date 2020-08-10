<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GoodsResource extends JsonResource
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
            'sold_count' => $this->virtual_sales,
            'name' => $this->name,
            'market_price' => $this->market_price,
            'price' => $this->price,
            'cover' => asset('storage/'.$this->cover),
            'subtitle' => $this->subtitle,
            'is_new' => $this->is_new,
            'is_hot' => $this->is_hot,
            'is_recommend' => $this->is_recommend,
            'is_discount' => $this->is_discount,
            'created_at' => $this->created_at->format("Y-m-d"),
            'description' => $this->when(!empty($request->goods), $this->description),
            'pictures' => $this->when(!empty($request->goods), $this->goods_pictures),
            'comment_count' => $this->comments_count,
        ];
    }
}
