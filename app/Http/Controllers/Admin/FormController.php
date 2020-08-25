<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class FormController extends Controller
{
    const VIEWAS = [
        'album' => 'admin.form.album',
        'conference' => 'admin.form.conference',
    ];
    public function show(Request $request) {
        $article_id = $request->article_id;
        $category_id = $request->category_id;
        $category = Category::find($category_id);

        $identity = $category->type->identity;
        $article = !empty($article_id)? Article::where([['category_id', $category_id], ['id', $article_id]])->first() : '';
        if(empty(self::VIEWAS[$identity])) {
            return '';
        }
        return view(self::VIEWAS[$identity], ['data' => $article]);





        // if($article_id) {
        //     $article = Article::find($article_id);
        //     if($article->category->type->identity == 'album') {
        //         return view('admin.form.album', ['data' => $article->album->thumb, 'text' => $article->album->images['text']]);
        //     }



        //     // if($category_id == $article->category_id) {
        //     //     if($article->category->type->identity == 'album') {
        //     //         return view('admin.form.album', ['data' => $article->album->thumb, 'text' => $article->album->images['text']]);
        //     //     }
        //     // }
        // }



        // $category = Category::find($category_id);
        // if(!$category) {
        //     return '';
        // }
        // $type = $category->type->identity;
        // if(isset(self::VIEWAS[$type])) {
        //     return view(self::VIEWAS[$type]);
        // }
        // return '';


        // $article = Article::find($article_id);
        // if(!$article) {
        //     return '';
        // }
        // if($article->category->type->identity == 'album') {
        //     return view('admin.form', ['data' => $article->album->images]);
        // }
    }
}
