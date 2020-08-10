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
}
