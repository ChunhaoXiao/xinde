<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ColumnAuthor;
use App\Http\Resources\ColumnAuthor as ColumnAuthorResource;
class AuthorController extends Controller
{
    public function index() {
        return ColumnAuthorResource::collection(ColumnAuthor::paginate(20));
    }
}
