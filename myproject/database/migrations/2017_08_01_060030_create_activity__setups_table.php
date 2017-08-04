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
            $table->smallInteger('is_computable');
            $table->smallInteger('passing_criteria');
            $table->float('passing', 5,2);
            $table->float('max_rate', 5,2);
            $table->smallInteger('require_appraiser');
            $table->smallInteger('is_skippable');
            $table->integer('stage_setups_id')->references('id')->on('stage_setups');
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
