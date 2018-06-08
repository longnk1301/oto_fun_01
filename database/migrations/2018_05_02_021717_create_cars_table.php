<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comp_id');
            $table->integer('type_id');
            $table->integer('color_id');
            $table->string('car_name')->nullable();
            $table->integer('car_cost')->default(0);
            $table->text('summary')->nullable();
            $table->integer('car_number')->default(0);
            $table->integer('car_year')->nullable();
            $table->string('status')->default('UnPublic');
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
        Schema::dropIfExists('cars');
    }
}
