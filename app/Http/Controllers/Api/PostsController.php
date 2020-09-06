<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Category;
use Parsedown;

class PostsController extends Controller
{
    public function index(Post $post)
    {
        $posts = Post::orderBy('created_at', 'desc')->with('category')->paginate(3);
        $posts->category_name = $post->category;
        return response()->json($posts);
    }

    public function show(Parsedown $parsedown, Post $post, Category $category)
    {

        $post->body = $parsedown->text($post->body);
        $post->category = $category->find($post->category_id)->name;
        return response()->json($post);
    }

    public function category(Parsedown $parsedown, Request $request)
    {
        $categories = Post::where('category_id', $request->category_id)->orderBy('created_at', 'desc')->paginate(3);
        foreach ($categories as $category) {
            $category->body = $parsedown->text($category->body);
        }
        return response()->json($categories);
    }
}
