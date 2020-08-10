<?php

use App\Models\Article;
use Illuminate\Database\Seeder;
use App\Models\Category;
class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        $categories->each(function($item) {
            $articles = factory(App\Models\Article::class, 5)->create(['category_id' => $item->id]);
        });
    }
}
