<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advisory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cus_name');
            $table->integer('identification');
            $table->integer('cus_phone');
            $table->text('cus_add')->nullable();
            $table->string('cus_email');
            $table->integer('car_id');
            $table->text('content')->nullable();
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('order');
    }
}
