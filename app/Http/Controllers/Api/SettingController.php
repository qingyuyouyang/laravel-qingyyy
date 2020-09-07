<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Setting;
use TCG\Voyager\Models\Post;

class SettingController extends Controller
{

    public function index()
    {
        $dates = [];
        $dates['visited'] = Setting::firstWhere('key','site.visited')->value+1;
        $dates['run_days'] = Setting::firstWhere('key','site.run_days')->value;
        $dates['article_nums'] = Post::count();
        return response()->json($dates);
    }

    public function update(Request $request)
    {
        $visited = Setting::firstWhere('key','site.visited');
        $visited -> value = $visited->value + $request->visit;
        $visited -> save();

        $run_days = Setting::firstWhere('key','site.run_days');
        $run_days -> value = intval((time() - strtotime("2020-05-31"))/60/60/24);
        $run_days -> save();

        $article_nums = Post::count();

        $sidebar['visited'] = $visited -> value;
        $sidebar['run_days'] = $run_days -> value;
        $sidebar['article_nums'] = $article_nums;
        $sidebar['title'] = setting('site')['title'];
        $sidebar['jumbotron'] = config('app.url').'/storage/'.setting('site')['jumbotron'];
        $sidebar['avatar'] = config('app.url').'/storage/'.setting('site')['avatar'];
        return response()->json($sidebar);
    }

    public function website()
    {
        $setting = setting('site');
        $setting['logo'] = config('app.url').'/storage/'.setting('site')['logo'];
        return response()->json($setting);
    }
}
