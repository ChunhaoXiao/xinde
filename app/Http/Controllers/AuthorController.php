<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ColumnAuthor;

class AuthorController extends Controller
{
    public function index() {
        return ColumnAuthor::paginate(20);
    }
}
