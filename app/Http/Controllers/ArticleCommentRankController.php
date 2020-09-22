<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Http\Resources\Article as ArticleResource;

class ArticleCommentRankController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Category $category = null)
    {
        $limit = $request->input('limit', 10);
        $limit = intval($limit)??10;
        if($category) {
            return ArticleResource::collection($category->articles()->orderBy('comments_count', 'desc')->limit($limit)->get());
        }
        return ArticleResource::collection(Article::orderBy('comments_count', 'desc')->limit($limit)->get());
    }
}
