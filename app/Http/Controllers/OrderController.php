<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Goods;
use App\Services\OrderService;
use App\Http\Resources\Order as OrderResource;
use App\Models\Order;
use App\Http\Requests\OrderStorageRequest;

class OrderController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService) {
        $this->orderService = $orderService;
    }

    public function index($type = '') {
        $datas = Auth::user()->orders()->type($type)->latest()->get();
        return OrderResource::collection($datas);
    }

    public function store(OrderStorageRequest $request) {
        $datas = $request->input();
        if(!empty($request->goods_id)) {
            $this->orderService->createOrderFromGoods($request->input());
            return response()->json(['message' => 'success']);
        }
        try {
            $this->orderService->createOrderFromCart($request->only('address_id', 'note'));
        } catch(\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
        return response()->json(['message' => 'success']);
    }

    //取消订单
    public function update(Request $request, Order $order) {
        try{
            $order->cancel();
        } catch(\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
        return response()->json(['message' => 'success']);
    }

    public function show($id) {
        $order = Auth::user()->orders()->findOrFail($id);
        return new OrderResource($order);
    }
}
