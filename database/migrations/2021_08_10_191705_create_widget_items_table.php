<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidgetItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widget_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('widget_id')->nullable();

            $table->string('image')->nullable();
            $table->string('file')->nullable();

            $table->string('caption')->nullable();
            $table->string('caption_id')->nullable();
            
            $table->string('title');
            $table->string('title_id')->nullable();
            
            $table->string('description');
            $table->string('description_id')->nullable();

            $table->tinyInteger('active')->default(0);
            $table->string('ordering_at')->nullable();
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
        Schema::dropIfExists('widget_items');
    }
}
