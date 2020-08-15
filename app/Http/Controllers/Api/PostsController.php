<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;
use Parsedown;

class PostsController extends Controller
{
    public function index(Parsedown $parsedown)
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->body = $parsedown->text($post->body);
        }
        return response()->json($posts);
    }

    public function show(Parsedown $parsedown, Post $post)
    {

        $post->body = $parsedown->text($post->body);
        return response()->json($post);
    }
}
