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
            $table->string('car_name')->unique();
            $table->string('car_image')->nullable();
            $table->integer('car_cost')->default(0);
            $table->text('summary')->nullable();
            $table->string('car_type')->nullable();
            $table->string('car_company');
            $table->integer('car_number')->default(0);
            $table->string('car_color')->nullable();
            $table->integer('car_years')->nullable();
            $table->string('tags');
            $table->string('view_id');
            $table->integer('status')->default(0);
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
