<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Http\Resources\Article as ArticleResource;
class ColumnTopArticleController extends Controller
{
    public function index() {
        $datas = Category::with('toparticle')->get();
        $res = $datas->pluck('toparticle')->filter()->values();
        //return $res;
        return ArticleResource::collection($res);
    }
}