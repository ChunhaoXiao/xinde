<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\ArticleCategory;
class CategoryController extends Controller
{
    public function index() {
        return ArticleCategory::collection(Category::withCount('articles')->get());
    }
}
