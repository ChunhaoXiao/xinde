<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Goods;
use Faker\Generator as Faker;

$factory->define(Goods::class, function (Faker $faker) {
    $price = $faker->randomFloat(2, 10, 200);
    return [
        'name' =>  $faker->name,
        'market_price' => $price,
        'price' => $price * 0.8,
        'subtitle' => $faker->text(150),
        'cover' => 'uploads/'.$faker->file(storage_path('app/public/pictures'), storage_path('app/public/uploads'), false),
        'virtual_sales' => $faker->randomNumber(),
        'stock' => $faker->randomNumber(),
        'is_new' => $faker->randomNumber() % 2,
        'is_recommend' => $faker->randomNumber() % 2,
        'is_hot' => $faker->randomNumber() % 2,
        'description' => $faker->text(300),
    ];
});

$factory->afterCreating(Goods::class, function($goods, $faker){
    $goods->pictures()->createMany([
        [
            'path' => 'uploads/'.$faker->file(storage_path('app/public/pictures'), storage_path('app/public/uploads'), false),
        ],
        [
            'path' => 'uploads/'.$faker->file(storage_path('app/public/pictures'), storage_path('app/public/uploads'), false),
        ],
        [
            'path' => 'uploads/'.$faker->file(storage_path('app/public/pictures'), storage_path('app/public/uploads'), false),
        ]
    ]);
});
