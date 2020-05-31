<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Setting;

class SettingController extends Controller
{
    public function update(Request $request)
    {
        $visited = Setting::firstWhere('key','site.visited');
        $visited -> value = $visited->value + $request->visit;
        $visited -> save();

        $run_days = Setting::firstWhere('key','site.run_days');
        $run_days -> value = intval((time() - strtotime("2020-05-31"))/60/60/24);
        $run_days -> save();
        return response()->json(setting('site'));
    }
}
