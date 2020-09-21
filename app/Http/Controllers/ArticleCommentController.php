<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Resources\ArticleComment;
use Auth;
use App\Models\ArticleComment as Comment;
use App\Http\Requests\ArticleCommentStoreRequest;
class ArticleCommentController extends Controller
{

    public function __construct()
    {   
        $this->middleware('auth:api')->only(['store', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {
        $comments = $article->comments()->latest()->paginate();
        return ArticleComment::collection($comments);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCommentStoreRequest $request, Article $article)
    {
        $comment = $article->comments()->make($request->input());
        Auth::user()->comments()->save($comment);
        return response()->json(['message' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $articlecomment)
    {
        $this->authorize('delete', $articlecomment);
        $articlecomment->delete();
        return response()->json(['message' => 'success']);
    }
}
