<?php

use Illuminate\Database\Seeder;
use App\Models\ContentType;

class ContentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'name' => '普通文章',
                'identity' => 'basic_article',
                'model' => "App\Models\BasicArticle",
            ],
            [
                'name' => '图片集',
                'identity' => 'album',
                'model' => "App\Models\Album",
            ],
            [
                'name' => '专题',
                'identity' => 'special',
                'model' => "App\Models\Special",
            ],
            [
                'name' => '会务',
                'identity' => 'conference',
                'model' => "App\Models\Conference",
            ],
            
        ];

        foreach($datas as $v) {
            ContentType::firstOrCreate(['identity' => $v['identity']], $v);
        }
    }
}
