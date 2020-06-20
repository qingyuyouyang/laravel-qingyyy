<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        return response()->json(Post::all());
    }

    public function show(Post $post)
    {
        return response()->json($post);
    }
}
