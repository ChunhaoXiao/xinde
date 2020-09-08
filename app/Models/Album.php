<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'article_id', 'images', 'content', 'max_width'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function getThumbAttribute() {
        return array_map(function($item){
            return basename($item);
        }, $this->images['picture']);
    }

    public function getAllImagesAttribute() {

        $pictures = $this->images['picture']??[];
        if(empty($pictures)) {
            return [];
        }
        foreach($pictures as $k => $v) {
            $row['path'] = asset('storage/'.$v);
            $row['text'] = $this->images['text'][$k]??'';
            $res[] = $row;
        }
        return $res;
        //return array_map(function($item){ return ['path' => asset('storage/'.$item), 'text' => ''];}, $pictures);
    }
}
