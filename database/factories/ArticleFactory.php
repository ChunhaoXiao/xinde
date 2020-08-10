<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;
//use Carbon\Carbon;

$factory->define(Article::class, function (Faker $faker) {
    $dir = date("Ym");
    if(!is_dir(storage_path('app/public/uploads/'.$dir))) {
        mkdir(storage_path('app/public/uploads/'.$dir));
    }
    return [
        'title' => $faker->sentence(8),
        //'content' => $faker->text(500),
        //'cover' => $faker->image(storage_path('app/public/uploads'), 150, 150,true,true),
        'cover' => 'uploads/'.$dir.'/'.$faker->file(storage_path('app/public/pictures'), storage_path('app/public/uploads/'.$dir), false),
        'source' => '信德海事',
        'category_id' => 1
    ];
});

$factory->afterCreating(Article::class, function($article, $faker){
   
    $dir = date("Ym");
    if($article->category->content_type_id == 2) {
        for($i = 0; $i < 5; $i ++) {
            $data['picture'] = 'uploads/'.$dir.'/'.$faker->file(storage_path('app/public/pictures'), storage_path('app/public/uploads/'.$dir), false);
            $data['text'] = '测试一下';
            $res[] = $data;
        }
        $article->album()->create([
            'content' => $faker->text(100),
            'images' => json_encode($res),
        ]);
    }
    elseif($article->category->content_type_id == 1) {
        $article->basic_article()->create([
            'content' => $faker->text(500),
        ]);
    }

    elseif($article->category->content_type_id == 4) {
        $article->conference()->create([
            'introduction' => $faker->text(150),
            'address' => $faker->sentence(8),
            'content' => $faker->text(500),
            'start_date' => now()->addDays(random_int(2, 20)),
            'enroll_begin_time' => now()->addMinutes(random_int(2, 200)),
            'enroll_end_time' => now()->addMinutes(random_int(2, 200)),
        ]);
    }
    
    
    $comments = factory(App\Models\ArticleComment::class, 10)->create(['article_id' => $article->id]);
});
