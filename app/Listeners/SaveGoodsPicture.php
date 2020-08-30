<?php

namespace App\Listeners;

use App\Events\GoodsSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveGoodsPicture
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
     * @param  GoodsSaved  $event
     * @return void
     */
    public function handle(GoodsSaved $event)
    {
        $goods = $event->goods;
        $existPictures = $goods->pictures->isNotEmpty() ? $goods->pictures->pluck('path'):[];
        if(empty($goods->images)) {
            return $goods->pictures()->delete();
        }
        $data = array_map(function($item){ return ['path' => $item];}, $goods->images);
        if($goods->pictures()->doesntExist()) {
            return $goods->pictures()->createMany($data);
        }
        $deletePictures = array_diff($existPictures, $goods->images);
        $addPictures = array_diff($goods->images, $existPictures);
        $goods->pictures()->whereIn('path', $deletePictures)->delete();
        if(!empty($addPictures)) {
            foreach($addPictures as $v) {
                $goods->pictures()->create(['path' => $v]);
            }
        }

    }
}
