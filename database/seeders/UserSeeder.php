<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "first_name" => "fadmin",
            "last_name" => "ladmin",
            "username" => "admin",
            "email" => "admin@admin.com",
            "mobile" => "03333333333",
            "address" => "admin address",
            "password" => Hash::make("admin"),
            "gender" => "male",
            "profile_img" => "admin.png",
            "role" => "admin",
            "role_id" => 1,
        ]);
    }
}
