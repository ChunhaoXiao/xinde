<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $guarded = [];
    protected $withCount = ['comments'];

    public function scopeRecommend($query) {
        return $query->where('is_recommend', 1);
    }

    public function scopeHot($query) {
        return $query->where('is_hot', 1);
    }

    public function scopeDiscount($query) {
        return $query->where('is_discount', 1);
    }

    public function pictures() {
        return $this->hasMany(GoodsPicture::class, 'goods_id');
    }

    public function getGoodsPicturesAttribute() {
        return $this->pictures->map(function($item) {
            return asset('storage/'.$item->path);
        })->toArray();
    }

    public function scopeType($query, $type) {
        if(in_array($type, ['new', 'recommend', 'hot'])) {
            return $query->where('is_'.$type, 1);
        }
        return $query;
    }

    public function scopeSearch($query, $keyword) {
        return $query->where('name', 'like', '%'.$keyword.'%')->orWhere('subtitle', 'like', '%'.$keyword.'%')->orWhere('description', 'like','%'.$keyword.'%');
    }

    public function getGoodsCoverAttribute() {
        return asset('storage/'.$this->cover);
    }

    public function comments() {
        return $this->hasMany(GoodsComment::class, 'goods_id');
    }
}
