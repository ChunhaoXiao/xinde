<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AfterSale extends Model
{
    const STATUS = [
        '待确认', 
        '待退货', 
        '待审核', 
        '已完成', 
        '已拒绝', 
        '已取消',
    ];

    protected $guared = [];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function order_detail() {
        return $this->belongsTo(OrderDetail::class, 'order_detail_id');
    }

    public function goods() {
        return $this->belongsTo(Goods::class, 'goods_id');
    }

    public function getStatusNameAttribute() {
        return self::STATUS[$this->status];
    }
}
