<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Resources\Article as ArticleResource;
class ConferenceController extends Controller
{
    public function index(Request $request, $type = 1) {
        $limit = $request->input('limit', 10);
        $limit = intval($limit)??10;
        $datas =  Article::whereHas('conference', function($query) use ($type) {
            $type == 1? $query->coming():$query->passed();
        })->oldest('created_at')->paginate($limit);
        
        return ArticleResource::collection($datas);
    }

    
}
