<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Http\Resources\GoodsResource;
class GoodsSearchController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->input('keyword');
        $goods = Goods::search($keyword)->paginate();
        return GoodsResource::collection($goods);
    }
}
