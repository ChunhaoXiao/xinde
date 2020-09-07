<?php

namespace App\Http\Controllers;

use App\Models\ColumnAuthor;
use Illuminate\Http\Request;
use App\Http\Resources\Article;

class AuthorArticlesController extends Controller
{
    public function index(ColumnAuthor $author) {
        $datas = $author->articles()->latest()->paginate(20);
        return Article::collection($datas);
    }
}
