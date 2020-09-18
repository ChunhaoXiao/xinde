<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    protected $guarded = [];

    protected $with = [
        'user'
    ];

    protected $withCount = [
        'likes'
    ];
    public function article() {
        return $this->belongsTo(Article::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comment() {
        return $this->belongsTo(ArticleComment::class, 'comment_id');
    }

    public function likes() {
        return $this->morphMany('App\Models\CommentLike', 'likeable');
    }

    public function scopeFilter($query, $where) {
        $where = array_filter($where);
        if(empty($where)) {
            return $query;
        }
        $fields = ['user_id', 'article_id'];
        foreach($where as $k => $v) {
            if($v) {
                if(in_array($k, $fields)) {
                    $query->where($k, $v);
                }
                elseif(in_array($k, ['username', 'content'])) {
                    $query->$k($v);
                }
            }
            
        }
        return $query;
    }

    public function scopeUsername($query, $name) {
        return $query->whereHas('user', function($query) use($name) {
            $query->where('name', $name);
        });
    }

    public function scopeContent($query, $content) {
        return $query->where('content', 'like', '%'.$content.'%');
    }
    
}
