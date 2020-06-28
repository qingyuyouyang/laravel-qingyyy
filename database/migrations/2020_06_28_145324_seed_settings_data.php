<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedSettingsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $Settings = [
            [
                'key'          => 'site.visited',
                'display_name' => '访问次数',
                'value'        => '0',
                'type'         => 'text',
                'order'        => '6',
                'group'        => 'Site'
            ],
            [
                'key'          => 'site.run_days',
                'display_name' => '运行天数',
                'value'        => '',
                'type'         => 'text',
                'order'        => '7',
                'group'        => 'Site'
            ],
        ];

        DB::table('settings')->insert($Settings);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('settings')->truncate();
    }
}
