<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubActivitySetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_activity_setup', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->integer('max_value')->nullable();
            $table->integer('min_value')->nullable();
            $table->smallInteger('type');
            $table->integer('activity_setup_id')->references('id')->on('activity_setup');
            $table->softDeletes();
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
        Schema::dropIfExists('sub_activity_setup');
    }
}
