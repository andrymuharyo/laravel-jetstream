<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->default(1);
            $table->integer('category_id')->nullable();
            $table->string('image')->nullable();
            $table->string('caption')->nullable();
            $table->string('caption_id')->nullable();
            $table->string('title');
            $table->string('title_id')->nullable();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->text('url')->nullable();
            $table->tinyInteger('active')->default(0);
            $table->string('ordering_at')->nullable();
            $table->dateTime('submitted_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('video_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->default(1);
            $table->string('title');
            $table->string('title_id')->nullable();
            $table->tinyInteger('active')->default(0);
            $table->string('ordering_at')->nullable();
            $table->dateTime('submitted_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('video_categories');
        Schema::dropIfExists('videos');
    }
}
