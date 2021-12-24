<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->default(1);
            $table->string('privacy')->default('public');
            $table->string('image')->nullable();
            $table->string('caption')->nullable();
            $table->string('caption_id')->nullable();
            $table->string('title');
            $table->string('title_id')->nullable();
            $table->string('slug');
            $table->string('slug_id')->nullable();
            $table->text('intro')->nullable();
            $table->text('intro_id')->nullable();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->text('categories')->nullable();
            $table->text('keywords')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
