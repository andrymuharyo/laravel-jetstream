<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->default(1);
            $table->integer('parent_id')->default(0);

            $table->string('type')->default('url');
            $table->string('target')->default('_self');

            $table->string('title');
            $table->string('title_id')->nullable();
            $table->text('intro')->nullable();
            $table->text('intro_id')->nullable();

            $table->text('url')->nullable();
            $table->text('uri')->nullable();
            $table->integer('content_id')->nullable();

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
        Schema::dropIfExists('navigations');
    }
}
