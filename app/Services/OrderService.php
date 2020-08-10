<?php
namespace App\Services;
use App\Models\Goods;
use Illuminate\Support\Facades\Auth;

class OrderService {
    //直接购买
    public function createOrderFromGoods($datas) {
        //临时购物车
        $tempCart = Auth::user()->temp_cart()->create([
            'goods_id' => $datas['goods_id'],
            'quantity' => $datas['quantity'],
        ]);
        
        $datas['total_amount'] = $tempCart->getTotalPrice();
        unset($datas['goods_id'], $datas['quantity']);

        $order = Auth::user()->orders()->create($datas);
        $order->createDetail(collect([$tempCart]));
        $tempCart->delete();
    }

    
    public function createOrderFromCart($datas) {
        $carts = Auth::user()->carts;
        if($carts->isEmpty()) {
            throw new \Exception("购物车没有商品");
            return;
        }
        $datas['total_amount'] = $carts->sum(function($item) {
            return $item->goods->price * $item->quantity;
        });
        $order = Auth::user()->orders()->create($datas);
        $order->createDetail($carts);
    }
}