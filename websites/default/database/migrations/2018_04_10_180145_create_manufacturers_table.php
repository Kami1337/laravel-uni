<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('filename')->default('[]');
            $table->timestamps();
        });
    
        Schema::create('car_manufacturer', function (Blueprint $table) {
            $table->integer('car_id');
            $table->integer('manufacturer_id');
            $table->primary(['car_id','manufacturer_id']);
        });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manufacturers');
        Schema::dropIfExists('car_manufacturer');
    }
}
