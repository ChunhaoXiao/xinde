<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ColumnAuthor;

class TopAuthorController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $datas = Article::select(DB::raw("SUM(views) as count, column_author_id"))->whereNotNull('column_author_id')->groupBy('column_author_id')->orderBy('count', 'desc')->limit(10)->get();
        $authors = $datas->pluck('author');
        return ColumnAuthor::collection($authors);
    }
}
