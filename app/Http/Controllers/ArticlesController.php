<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\Article as ArticleResource;

class ArticlesController extends Controller
{
    public function index(Category $category) {
        $articles = $category->articles()->latest()->paginate();
        return new ArticleCollection($articles);
    }

    public function show(Article $article) {
        return new ArticleResource($article);
    }
}
