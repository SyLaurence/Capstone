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
        Schema::create('subactivitysetup', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->integer('maxvalue')->nullable();
            $table->integer('minvalue')->nullable();
            $table->smallInteger('type');
            $table->integer('activitysetup_id')->references('id')->on('activitysetup');
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
        Schema::dropIfExists('subactivitysetup');
    }
}
