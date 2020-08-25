<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Storage;
class UploaderController extends Controller
{
    public function store(Request $request) {
        $path = $request->file->store('uploads');
        $img = Image::make(Storage::url($path))->resize(150, 150);
        if(!Storage::exists('thumb')) {
            Storage::makeDirectory('thumb');
        }
        $img->save('./storage/thumb/'.basename($path));
        return response()->json(['link' => asset('storage/'.$path), 'savepath' => $path]);
    }
}
