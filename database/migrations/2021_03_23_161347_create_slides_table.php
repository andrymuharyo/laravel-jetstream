<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->default(1);
            $table->string('image')->nullable();
            $table->string('image_mobile')->nullable();
            $table->string('caption')->nullable();
            $table->string('caption_id')->nullable();
            $table->string('title');
            $table->string('title_id')->nullable();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->string('button')->nullable();
            $table->string('button_id')->nullable();
            $table->text('url')->nullable();
            $table->string('copyright')->nullable();
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
        Schema::dropIfExists('slides');
    }
}
