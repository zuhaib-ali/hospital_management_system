<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("permissions")->insert([
            "permission" => "Appointments"
        ]);

        DB::table("permissions")->insert([
            "permission" => "Branches"
        ]);

        DB::table("permissions")->insert([
            "permission" => "Doctors"
        ]);

        DB::table("permissions")->insert([
            "permission" => "Laboratories"
        ]);

        DB::table("permissions")->insert([
            "permission" => "Patients"
        ]);

        DB::table("permissions")->insert([
            "permission" => "Reports"
        ]);

        DB::table("permissions")->insert([
            "permission" => "Pharmacy"
        ]);

        DB::table("permissions")->insert([
            "permission" => "Manage Roles"
        ]);

        DB::table("permissions")->insert([
            "permission" => "Settings"
        ]);

        DB::table("permissions")->insert([
            "permission" => "Specialization"
        ]);

        DB::table("permissions")->insert([
            "permission" => "Users"
        ]);
    }
}
