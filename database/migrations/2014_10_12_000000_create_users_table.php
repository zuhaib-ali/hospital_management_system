<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->default('NA');
            $table->string('last_name')->default('NA');
            $table->string('email');
            $table->string('mobile')->default('NA');
            $table->string('cnic')->unique()->default('NA');
            $table->unsignedInteger('age')->default(0);
            $table->string('blood_group')->default('NA');
            $table->text('address')->default('NA');
            $table->string('password')->unique()->default('NA');
            $table->string('dob')->default('NA');
            $table->string('gender')->default('NA');
            $table->string('profile_img')->default('NA');
            $table->string('role')->default('patient');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
