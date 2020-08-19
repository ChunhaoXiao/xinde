<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploaderController extends Controller
{
    public function store(Request $request) {
        $path = $request->file->store('uploads');
        return response()->json(['link' => asset('storage/'.$path), 'savepath' => $path]);
    }
}
