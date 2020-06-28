<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedMenuItemsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $menus = [
            'id' => 2,
            'name' => 'qingyyy'
        ];
        $menu_items = [
            [
                'menu_id' =>2,
                'title'   =>'主页',
                'url'     =>'',
                'order'   =>15
            ],
            [
                'menu_id' =>2,
                'title'   =>'心情随笔',
                'url'     =>'',
                'order'   =>16
            ],
            [
                'menu_id' =>2,
                'title'   =>'工作笔记',
                'url'     =>'',
                'order'   =>17
            ]
        ];

        DB::table('menus')->insert($menus);
        DB::table('menu_items')->insert($menu_items);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('menu_items')->truncate();
    }
}
