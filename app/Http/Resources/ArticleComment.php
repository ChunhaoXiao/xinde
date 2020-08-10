<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleComment extends JsonResource
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
           'user' => $this->user->name,
           'content' => $this->content,
           'created_at' => $this->created_at->format("Y-m-d H:i:s"),
           'like_count' => $this->likes_count,
       ];
    }
}
