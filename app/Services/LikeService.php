<?php
namespace App\Services;
use Exception;
use Auth;
class LikeService {
    const MODELS = [
        'article' => 'App\Models\ArticleComment',

    ];

    public function toggleLike($type, $id) {
        $model = self::MODELS[$type];
        if(!class_exists($model)) {
            throw new Exception("模型不存在");
        }
        $data = $model::findOrFail($id);
        if($data->likes()->where('user_id', Auth::id())->exists()) {
            $data->likes()->where('user_id', Auth::id())->delete();
            return -1;
        }
        $data->likes()->create(['user_id' => Auth::id()]);
        return 1;
    } 
}