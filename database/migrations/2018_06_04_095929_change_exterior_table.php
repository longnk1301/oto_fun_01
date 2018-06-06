<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeExteriorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exteriors', function (Blueprint $table) {
            $table->string('locks_nearby')->nullable()->change();
            $table->string('locks_remote')->nullable()->change();
            $table->string('turn_signal_light')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exteriors', function (Blueprint $table) {
            //
        });
    }
}
