<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Facades\View;
use App\Models\ColumnAuthor;
use App\Events\ArticleSaved;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{

    public function __construct()
    {
        //View::share('categories', Category::with('subcates')->get());
        View::share('authors', ColumnAuthor::pluck('name', 'id'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$query = $category ? $category->articles() : Article::query();
        //$datas = $query->paginate();
       // $query->filter($request->all())->paginate();
        $datas = Article::filter($request->query())->latest()->paginate();
        return view('admin.article.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $datas = $request->input();
        if($request->cover) {
            $datas['cover'] = $request->cover->store('uploads');
        }
        $article = Article::create($datas);
        $article->fill(['extra' => $datas]);
        event(new ArticleSaved($article));
        return redirect()->route('admin.articles.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.article.create', ['data' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $datas = $request->all();
        foreach(['is_top', 'is_recommend', 'is_swiper'] as $v) {
            if(!isset($datas[$v])) {
                $datas[$v] = 0;
            }
        }
        $article->update($datas);
        $article->fill(['extra' => $datas]);
        event(new ArticleSaved($article));
        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
    $article->delete();
        return response()->json(['status' => 0]);
    }
}
