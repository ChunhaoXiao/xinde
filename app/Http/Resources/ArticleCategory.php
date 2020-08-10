<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleCategory extends JsonResource
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
            'name' => $this->name,
            'content_type_id' => $this->content_type_id,
            'icon' => !empty($this->icon) ? asset('storage/'.$this->icon):'',
            'sort' => $this->sort,
            'is_show' => $this->is_show,
            'article_count' => $this->articles_count,
        ];
    }
}
