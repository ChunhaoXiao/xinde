<?php

use Illuminate\Database\Seeder;
use App\Models\MicroVideoCategory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class MicroVideoCategorySeeder extends Seeder
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
                'name' => '航海航运',
                'icon' => Storage::putFile('icons', new File(storage_path('app/public/pictures/hangyun.png'))),
                'sort' => 0,
            ],
            [
                'name' => '港口风采',
                'icon' => Storage::putFile('icons', new File(storage_path('app/public/pictures/port.png'))),
                'sort' => 1,
            ],
            [
                'name' => '船舶技术',
                'icon' => Storage::putFile('icons', new File(storage_path('app/public/pictures/tech.png'))),
                'sort' => 2,
            ],
            [
                'name' => '教育培训',
                'icon' => Storage::putFile('icons', new File(storage_path('app/public/pictures/edu.png'))),
                'sort' => 3,
            ],
        ];
        foreach($datas as $v) {
            MicroVideoCategory::firstOrCreate(['name' => $v['name']], $v);
        }
    }
}
