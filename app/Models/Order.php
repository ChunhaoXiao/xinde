<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS = [
        '待付款',
        '待发货',
        '待收货',
        '待评价',
        '已完成',
        '已取消',
    ];

    protected $guarded = [];

    protected $with = [
        'order_details.goods',
        //'address'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function address() {
        return $this->belongsTo(Address::class, 'address_id')->withDefault();
    }

    public function order_details() {
        return $this->hasMany(OrderDetail::class);
    }

    public function express() {
       
        return $this->belongsTo(Express::class)->withDefault();
    }

    public function scopeType($query, $type) {
        $status = [
            'unpaid' => 0,
            'paid' => 1,
            'delivered' => 2,
            'confirmed' => 3,
            'finished' => 4,
            'canceled' => 5,
        ];
        if(!in_array($type, array_keys($status))) {
            return $query;
        }
        return $query->where('status', $status[$type]);
    }

    public function getOrderStatusAttribute() {
        return self::STATUS[$this->status];
    }

    public function getQuantity() {
        return $this->order_details->sum(function($item) {
           return  $item->quantity;
        });
    }

    public function createDetail($carts) {
        $details = $carts->map(function($item) {
            $data['name'] = $item->goods->name;
            $data['price'] = $item->goods->price;
            $data['goods_id'] = $item->goods->id;
            $data['quantity'] = $item->quantity;
            return $data;

        })->toArray();
        $this->order_details()->createMany($details);
    }

    public function cancel() {
        if($this->status != 0) {
            throw new \Exception('当前订单状态不能取消');
        }
        return $this->update(['status' => 5]);
    }

    public static function booted() {
        static::creating(function($order){
            $order->order_number = date("YmdHis").random_int(100, 999);
        });
    }
}
