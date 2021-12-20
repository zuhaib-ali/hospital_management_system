<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("roles")->insert([
            'role' => 'admin',
            'permission_id' => '["1", "2", "3","4","5","6","7", "8", "9", "10", "11"]'
        ]);
    }
}
