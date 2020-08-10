<?php

use Illuminate\Database\Seeder;
use App\Models\AdvertisementPosition;
class AdvertisementPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            [
                'mark' => 'index_index',
                'name' => '首页(资讯)'
            ],
            [
                'mark' => 'market_index',
                'name' => '航情列表页',
            ],
            [
                'mark' => 'hire_index',
                'name' => '招聘列表页',
            ],
            [
                'mark' => 'activity_index',
                'name' => '活动列表页',
            ],
            [
                'mark' => 'column_index',
                'name' => '专栏列表页',
            ],
            [
                'mark' => 'picture_index',
                'name' => '图片列表页',
            ],
        ];

        foreach($positions as $v) {
            $pos = AdvertisementPosition::firstOrCreate(['mark' => $v['mark']], $v);
            $pos->advertisement()->create([
                'content' => $pos->mark
            ]);
        }
    }
}
