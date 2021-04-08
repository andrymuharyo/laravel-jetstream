<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->integer('user_id')->default(1);

            $table->string('title');
            $table->string('title_id');
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();

            $table->string('button')->nullable();
            $table->string('button_id')->nullable();
            $table->string('url')->nullable();
            
            $table->string('target')->default('_self');
            $table->rememberToken();
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
