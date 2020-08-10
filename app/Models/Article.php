<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    protected $with = [
        'category.type',
        'basic_article',
        'album',
        'conference',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function comments() {
        return $this->hasMany(ArticleComment::class, 'article_id');
    }

    public function collections() {
        return $this->morphMany(Collection::class, 'collectionable');
    }

    public function basic_article() {
        return $this->hasOne(BasicArticle::class, 'article_id')->withDefault();
    }

    public function album() {
        return $this->hasOne(Album::class, 'article_id')->withDefault();
    }

    public function conference() {
        return $this->hasOne(Conference::class, 'article_id');
    }

    public function conference_enroll() {
        return $this->hasMany(ConferenceEnroll::class, 'conference_id');
    }

    //获取文章列表页封面
    public function getListCoverAttribute($v) {
        if($this->category->content_type_id == 1) {
            return asset('storage/'.$this->cover);
        }

        if($this->category->content_type_id == 2) {
            $images = json_decode($this->album->images, true);
            return array_map(function($item) {
                $item['picture'] = asset('storage/'.$item['picture']); 
                return $item;
            }, array_slice($images, 0, 3));
        }
    }

    public function getArticleContentAttribute($v) {
        $relation = $this->category->type->identity;
        return $this->$relation->content??'';
    }
}
