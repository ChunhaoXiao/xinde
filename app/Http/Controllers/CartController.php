<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CartStoreRequest;
use App\Http\Resources\Cart as CartResource;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Auth::user()->carts()->latest()->get();
        return CartResource::collection($datas);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartStoreRequest $request)
    {
       $data = $request->input();
       Auth::user()->addToCart($data['goods_id'], $data['quantity']);
       return response()->json(['message' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CartStoreRequest $request, Cart $cart)
    {
        $this->authorize('update', $cart);
        $cart->update(['quantity' => $request->quantity]);
        return response()->json(['message' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Cart $cart)
    // {
    //     $this->authorize('delete', $cart);
    //     $cart->delete();
    //     return response()->json(['message' => 'success']);
    // }

    public function destroy(Request $request)
    {
        $cart_ids = array_filter((array)($request->cart_id));
        if(empty($cart_ids)) {
            return response()->json(['message' => '数据不存在'], 404);
        }
        Auth::user()->carts()->whereIn('id', $cart_ids)->delete();
        return response()->json(['message' => 'success']);
    }
}
