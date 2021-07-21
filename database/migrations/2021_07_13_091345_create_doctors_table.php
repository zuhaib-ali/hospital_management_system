<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('degree');
            $table->string('specialist');
            $table->unsignedInteger('visiting_charge');
            $table->string('gender');
            $table->string('phone');
            $table->string('from');
            $table->string('to');
            $table->text('closing_days')->nullable();
            $table->string('avater');
            $table->text('address');
            $table->unsignedInteger('hospital_id');
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
        Schema::dropIfExists('doctors');
    }
}
