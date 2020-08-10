<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['name' => '资讯', 'sort' => 0, 'content_type_id' => 1],
            ['name' => '活动', 'sort' => 1, 'content_type_id' => 1],
            ['name' => '航情', 'sort' => 2, 'content_type_id' => 1],
            ['name' => '专栏', 'sort' => 3, 'content_type_id' => 1],
            ['name' => '专题', 'sort' => 4, 'content_type_id' => 3],
            ['name' => '图片', 'sort' => 5, 'content_type_id' => 2],
            ['name' => '资料', 'sort' => 6, 'content_type_id' => 1],
            ['name' => '问答', 'sort' => 8, 'content_type_id' => 1],
            ['name' => '会务', 'sort' => 9, 'content_type_id' => 4],
            
        ];
        foreach($datas as $v) {
            Category::firstOrCreate(['name' =>  $v['name']], $v);
        }
    }
}
