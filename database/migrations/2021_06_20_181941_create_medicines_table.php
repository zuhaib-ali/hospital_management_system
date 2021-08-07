<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('medicine_name');
            $table->foreignId('category_id');
            $table->unsignedInteger('purchase_price');
            $table->unsignedInteger('sale_price');
            $table->unsignedInteger('store_box');
            $table->unsignedInteger('quantity');
            $table->string('generic_name');
            $table->string('company');
            $table->string('effects');
            $table->string('expire_date');
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
        Schema::dropIfExists('medicines');
    }
}
