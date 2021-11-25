<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClosingDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('closing_days', function (Blueprint $table) {
            $table->id();
            $table->string("sunday")->nullable();
            $table->string("monday")->nullable();
            $table->string("tuesday")->nullable();
            $table->string("wednesday")->nullable();
            $table->string("thursday")->nullable();
            $table->string("friday")->nullable();
            $table->string("saturday")->nullable();
            $table->unsignedInteger("doctor_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('closing_days');
    }
}
