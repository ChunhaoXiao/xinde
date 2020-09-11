<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Http\Resources\Article as ArticleResource;
class ArticleRankController extends Controller
{
    public function index(Request $request, $category = null) {
        $limit = $request->input('limit', 10);
        if(!$category) {
            $articles = Article::popular()->limit($limit)->get();
            return ArticleResource::collection($articles);
        }
        $category = Category::findOrFail($category);
        $articles = $category->allArticles()->popular()->limit($limit)->get();
        return ArticleResource::collection($articles);
    }
}
