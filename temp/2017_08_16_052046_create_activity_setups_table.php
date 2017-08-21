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
            $table->string('name',30);
            $table->integer('number');
            $table->smallInteger('passing_criteria')->nullable();
            $table->smallInteger('type');
            $table->float('passing', 5,2)->nullable();
            $table->float('maxrate', 5,2)->nullable();
            //$table->smallInteger('requireappraiser');
            //$table->smallInteger('iscomputable');
            $table->smallInteger('has_subactivity');
            $table->smallInteger('is_skippable');
            $table->integer('stage_setup_id')->references('id')->on('stage_setup');
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
