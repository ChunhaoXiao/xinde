<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ArticleComment;
use Faker\Generator as Faker;
use App\Models\User;

$factory->define(ArticleComment::class, function (Faker $faker) {
    $users = User::limit(100)->get();
    return [
        'content' => $faker->sentence(10),
        'user_id' => $users->random()->id,
    ];
});

$factory->afterCreating(ArticleComment::class, function($comment, $faker){
    $users = User::limit(100)->get();
    if($comment->id % 3 == 0) {
        $likeUsers = $users->random(3)->map(function($user) {
            return ['user_id' => $user->id];
        })->toArray();
        foreach($likeUsers as $v) {
            $comment->likes()->create($v);
        }
    }
});

