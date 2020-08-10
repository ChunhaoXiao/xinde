<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function __invoke(Request $request) {
        $file = $request->file;
        $path = $file->store('uploads/comments');
        return [
            'path' => $path,
            'full_path' => asset('storage/'.$path),
        ];
    }
}
