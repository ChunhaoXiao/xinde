<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Http\Resources\Article as ArticleResource;
class ColumnTopArticleController extends Controller
{
    public function index() {
        // $datas = Category::top()->with('toparticle')->get();
        // $res = $datas->pluck('toparticle')->filter()->values();
        $top_categories = Category::top()->get();
        $res = [];
        $top_categories->each(function($item) {
            $article = $item->allArticles()->orderBy('is_recommend', 'desc')->orderBy('updated_at', 'desc')->first();
            if($article) {
                $item->article = new ArticleResource($article);
            }
        });
        
        return $top_categories;
    }
}
