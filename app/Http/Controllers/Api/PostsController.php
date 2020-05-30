<?php

namespace App\Http\Controllers\Api;

use App\Posts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return Posts::all();
    }
}
