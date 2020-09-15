<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Resources\Article as ArticleResource;
class ArticleSearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $str = $request->keyword??'';
        $datas = Article::filter(['title' => $str])->paginate();
        return ArticleResource::collection($datas);
    }
}
