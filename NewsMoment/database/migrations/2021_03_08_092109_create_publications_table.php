<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slugname')->unique();
            $table->string('title');
            $table->string('subtitle');
            $table->string('source');
            $table->string('image_url');
            $table->string('video_url');
            $table->string('category');
            $table->boolean('active');
            $table->boolean('has_video');
            $table->integer('views_counter')->unsigned();
            $table->date('created');
            $table->date('modified');
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
        Schema::dropIfExists('publications');
    }
}
