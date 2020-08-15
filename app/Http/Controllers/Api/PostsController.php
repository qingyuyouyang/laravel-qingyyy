<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;
use Parsedown;

class PostsController extends Controller
{
    public function index()
    {
        return response()->json(Post::all());
    }

    public function show(Parsedown $parsedown, Post $post)
    {

        $post->body = $parsedown->text($post->body);
        return response()->json($post);
    }
}
