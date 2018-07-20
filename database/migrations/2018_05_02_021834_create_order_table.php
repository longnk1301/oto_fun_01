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
            $table->string('cus_name')->nullable();
            $table->integer('identification')->nullable();
            $table->integer('cus_phone')->nullable();
            $table->text('cus_add')->nullable();
            $table->string('cus_email')->nullable();
            $table->integer('car_id')->nullable();
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
        Schema::dropIfExists('advisory');
    }
}
