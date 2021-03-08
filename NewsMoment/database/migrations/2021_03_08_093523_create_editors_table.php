<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editors', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->string('description');
						$table->string('profile_image_url');
						$table->string('facebook');
						$table->string('instagram');
						$table->string('twitter');
						$table->date('created');
						$table->date('modified');
						$table->boolean('is_admin');
						$table->boolean('is_active');
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
        Schema::dropIfExists('editors');
    }
}
