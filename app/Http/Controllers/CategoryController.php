<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\ArticleCategory;
class CategoryController extends Controller
{
    public function index($category_id = null) {
        if(!$category_id) {
            return ArticleCategory::collection(Category::top()->active()->withCount('articles')->get());
        }
        return ArticleCategory::collection(Category::active()->where('parent_id', $category_id)->withCount('articles')->get());
    }
}
