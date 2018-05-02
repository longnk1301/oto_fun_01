<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cate_id');
            $table->string('title')->unique();
            $table->string('image')->nullable();
            $table->text('summary')->nullable();
            $table->text('content')->nullable();
            $table->dateTime('post_date')->nullable();
            $table->string('views_id');
            $table->string('tags');
            $table->integer('created_by');
            $table->integer('status')->default(0);
            $table->string('slug')->unique();
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
        Schema::dropIfExists('posts');
    }
}
