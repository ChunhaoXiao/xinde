<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //$data =  parent::toArray($request);
        // $data['list_cover'] = $this->list_cover;

        // $data['content'] = $this->when($request->article, $this->article_content);
        // $data['images'] = $this->when($this->category->type->identity == 'album', json_decode($this->album->images));
        
        
        return [
            'id' => $this->id,
            'title' => $this->title,
            'cover' => $this->list_cover,
            //'content' => $this->when($request->article, $this->article_content),
            'content' => $this->striped_content,
            'source' => $this->source,
            'created' => $this->created_at->format("Y-m-d"),
            'images' => $this->when($this->category->type->identity == 'album', $this->album->all_images),
            'conference_type' => $this->when($this->category->type->identity == 'conference', $this->conference->conference_type??''),
            'start_time' => $this->when($this->category->type->identity == 'conference', $this->conference->start_date??''),
            'end_time' =>$this->when($this->category->type->identity == 'conference', $this->conference->end_date??''),
            'introduction' => $this->when($this->category->type->identity == 'conference', $this->conference->introduction??''),
            'address' => $this->when($this->category->type->identity == 'conference', $this->conference->address??''),
            'article_type' => $this->category->type->identity,
            'category_name' => $this->category->name,
            'category_id' => $this->category->id,
            'views' => $this->views,
            'author' => $this->author->name??'',
            'author_id' => $this->column_author_id??'',
            'is_recommend' => $this->is_recommend,
            'comment_count' => $this->comments_count,
        ];
        
    }

}
