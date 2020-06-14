<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'super admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'created_at'     => now(),
            'updated_at'     => now(),

        ]);
    }
}
