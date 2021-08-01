<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabtestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labtests', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->string("patient");
            $table->string("refered_by_doctor");
            $table->string("template")->nullable();
            $table->text("report");
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
        Schema::dropIfExists('labtests');
    }
}
