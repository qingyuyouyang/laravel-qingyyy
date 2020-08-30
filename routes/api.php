<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->name('api.v1.')->group(function() {
    Route::get('categories', 'Api\CategoriesController@index')
        ->name('categories.index');
    Route::patch('posts', 'Api\PostsController@index')
        ->name('posts.index');
    Route::patch('posts/category', 'Api\PostsController@category')
        ->name('posts.category');
    Route::get('posts/{post}', 'Api\PostsController@show')
        ->name('posts.show');
    Route::patch('setting', 'Api\SettingController@update')
        ->name('setting.update');
    Route::get('setting', 'Api\SettingController@index')
        ->name('setting.index');
});
