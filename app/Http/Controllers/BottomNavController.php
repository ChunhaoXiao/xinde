<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Us;

class BottomNavController extends Controller
{
    public function index() {
        return Us::latest('sort')->get();
    }

    public function show(Us $us) {
        return $us;
    }
}
