<?php

use App\Models\ContentType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ContentTypeSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(AdvertisementPositionSeeder::class);
        $this->call(GoodsSeeder::class);
    }
}
