<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Http\Resources\Article as ArticleResource;

class TopArticleController extends Controller
{
    public function index(Request $request, Category $category, $type="top") {
        
        $articles = $category->articles()->$type()->latest()->limit($request->count??4)->get();
        return ArticleResource::collection($articles);
    }
}
