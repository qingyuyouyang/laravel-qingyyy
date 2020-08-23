<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        return response()->json(Category::all());
    }
}
