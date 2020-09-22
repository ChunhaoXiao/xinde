<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Resources\Article as ArticleResource;
class ConferenceController extends Controller
{
    public function index($type = 1) {
        $datas =  Article::whereHas('conference', function($query) {
            $query->coming();
        })->oldest('created_at')->paginate(10);
        
        return ArticleResource::collection($datas);
    }

    
}
