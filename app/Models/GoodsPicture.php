<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsPicture extends Model
{
    protected $guarded = [];

    public function goods() {
        return $this->belongsTo(Goods::class, 'goods_id');
    }
}
