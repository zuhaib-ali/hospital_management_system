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
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('age')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('gender');
            $table->string('profile_img')->nullable();
            $table->text('address')->nullable();
            $table->string('password');
            $table->string("role")->default("user");
            $table->string("role_id")->nullable();
            $table->string('degree')->nullable();
            $table->unsignedInteger('specialization_id')->nullable();
            $table->unsignedInteger('hospital_id')->nullable();
            $table->unsignedInteger('doctor_id')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('visiting_charge')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
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
