<?php

namespace App\Listeners;

use App\Events\ArticleSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveArticleContent
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ArticleSaved  $event
     * @return void
     */
    public function handle(ArticleSaved $event)
    {
        $article = $event->article;
        $relation = $article->category->type->identity;
        if($article->is_recommend) {
            $article->category->articles()->where([['id', '<>', $article->id], ['is_recommend', 1]])->update(['is_recommend' => 0]);
        }
        $article->$relation()->updateOrCreate(['article_id' => $article->id],$article->extra);
    }
}
