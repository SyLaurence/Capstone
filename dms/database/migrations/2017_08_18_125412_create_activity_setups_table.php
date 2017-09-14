<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitySetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_setups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->integer('stage_no');
            $table->integer('number');
            $table->integer('target_days');
            $table->smallInteger('type');
            $table->smallInteger('is_skippable');
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
        Schema::dropIfExists('activity_setups');
    }
}
