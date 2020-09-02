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

    public function type() {
        return $this->belongsTo(ContentType::class, 'content_type_id');
    }

    public function scopeTop($query) {
        return $query->whereNull('parent_id');
    }

    public function canNotDelete() {
        return $this->subcates()->exists() || $this->articles()->exists();
    }

    public function toparticle() {
      
        return $this->hasOne(Article::class, 'category_id')->latest();
    }
}
