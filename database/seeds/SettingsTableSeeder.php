<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'id' => 1,
            'app_name' => 'الثمار الوطنيه جده',
            'image' => '' ,

            'created_at'     => now(),
            'updated_at'     => now(),

        ]);
    }
}
