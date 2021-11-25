<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->string('sex');
            $table->string('age');
            $table->string('blood_group');
            $table->string('image')->nullable();
            $table->string('status')->default("new");
            $table->timestamps();
            $table->unsignedInteger('doctor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
