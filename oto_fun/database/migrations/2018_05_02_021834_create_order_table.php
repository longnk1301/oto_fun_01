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
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cus_name')->nullable();
            $table->integer('identification')->unique();
            $table->integer('cus_zip');
            $table->integer('cus_phone')->nullable();
            $table->text('cus_add')->nullable();
            $table->string('cus_email')->unique();
            $table->integer('car_id');
            $table->text('content')->nullable();
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
        Schema::dropIfExists('order');
    }
}
