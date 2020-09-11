<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    const SEARCH_FIELDS = [
        'title', 
        'category_id', 
        'status', 
        'source', 
        'start_time', 
        'end_time',
    ];

    protected $fillable = [
        'title',
        'cover',
        'source',
        'user_id',
        'column_author_id',
        'category_id',
        'views',
        'status',
        'is_top',
        'extra',
        'is_recommend',
        'is_swiper',
    ];

    protected $with = [
        'category.type',
        'basic_article',
        'album',
        'conference',
        'author',
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

    public function author() {
        return $this->belongsTo(ColumnAuthor::class, 'column_author_id')->withDefault();
    }

    //获取文章列表页封面
    public function getListCoverAttribute($v) {
        return $this->cover ? asset('storage/'.$this->cover):'';
        // if($this->category->content_type_id == 1) {
        //     return asset('storage/'.$this->cover);
        // }

        // if($this->category->content_type_id == 2) {
        //     //$images = json_decode($this->album->images, true);
        //     $images = $this->album->images['picture']??[];
        //     return array_map(function($item) {
        //         $item['picture'] = asset('storage/'.$item['picture']); 
        //         return $item;
        //     }, array_slice($images, 0, 3));
        // }
    }

    public function getArticleContentAttribute($v) {
        $relation = $this->category->type->identity;
        return $this->$relation->content??'';
    }

    public function scopeFilter($query, $datas) {
        $datas = array_filter($datas, 'strlen');
        if(empty($datas)) {
            return $query;
        }
       
        foreach($datas as $k => $v) {
            if(in_array($k, self::SEARCH_FIELDS)) {
                if($k == 'title') {
                    $query->where('title', 'like', '%'.$v.'%');
                }
                elseif($k == 'start_time') {
                    $query->where('created_at', '>=', $v);
                }
                elseif($k == 'end_time') {
                    $query->where('created_at', '<=', $v);
                }
                else {
                    $query->where($k, $v);
                }
            }
        }
        return $query;
    }

    public function scopePopular($query) {
        return $query->orderBy('views', 'desc');
    }

    public function strip_tags_content($text) {
        return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
    }

    public function getStripedContentAttribute() {
        $data = strip_tags($this->article_content);
        $data = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $data);
        return $data;
    }

    public function scopeTop($query) {
        return $query->where('is_top', 1);
    }

    public function scopeSwiper($query) {
        return $query->where('is_swiper', 1);
    }

    // public function scopeAllArticles($category_id) {
    //     $category = Category::find($category_id);
    //     if($category->subcates()->exists()) {

    //     }
    // }

    

    // public function scopeRange($query, $data) {
        
    //     if(!empty($data['start_time'])) {
    //         $query->where('created_at', '>', $data['start_time']);
    //     }
    //     if(!empty($data['end_time'])) {
    //         $query->where('created_at', '<', $data['end_time']);
    //     }
    //     return $query;
    // }
}
