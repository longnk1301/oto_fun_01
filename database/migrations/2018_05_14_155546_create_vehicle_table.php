<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->increments('id');
            $table->string('interior_color');
            $table->string('exterior_color');
            $table->string('transmission');
            $table->string('engine');
            $table->integer('mileage')->nullable();
            $table->string('fuel_type');
            $table->string('drive_type');
            $table->string('mpg');
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
        Schema::dropIfExists('vehicle');
    }
}
