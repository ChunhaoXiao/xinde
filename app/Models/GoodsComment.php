<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsComment extends Model
{

    protected $with = [
        'user'
    ];
    
    protected $guarded = [];

    protected $casts = [
        'pictures' => 'array'
    ];
    
    public function goods() {
        return $this->belongsTo(Goods::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
