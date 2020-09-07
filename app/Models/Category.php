<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $withCount = [
        'articles'
    ];
    protected $guarded = [];

    public function subcates() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function articles() {
        return $this->hasMany(Article::class, 'category_id');
    }

    // public function allArticles() {
    //     return $this->hasManyThrough(Article::class, Category::class);
    // }

    public function type() {
        return $this->belongsTo(ContentType::class, 'content_type_id');
    }

    public function scopeTop($query) {
        return $query->whereNull('parent_id');
    }

    public function scopeActive($query) {
        return $query->where('is_show', 1);
    }

    public function canNotDelete() {
        return $this->subcates()->exists() || $this->articles()->exists();
    }

    public function toparticle() {
        return $this->hasOne(Article::class, 'category_id')->where('is_recommend', 1);
    }

    public function allArticles() {
        if($this->subcates()->exists()) {
            $subcates_id = $this->subcates->pluck('id')->toArray();
            $subcates_id[] = $this->id;
            $inIds = $subcates_id;
        }
        else {
            $inIds = [$this->id];
        }
        return Article::whereIn('category_id', $inIds);
    }

}
