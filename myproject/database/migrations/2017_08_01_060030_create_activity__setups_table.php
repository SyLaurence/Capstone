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
        Schema::create('activitysetup', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->integer('number');
            $table->smallInteger('passingcriteria');
            $table->smallInteger('type');
            $table->float('passing', 5,2);
            $table->float('maxrate', 5,2);
            $table->smallInteger('appraiser');
            $table->smallInteger('iscomputable');
            $table->smallInteger('isskippable');
            $table->integer('stagesetup_id')->references('id')->on('stagesetup');
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
        Schema::dropIfExists('activitysetup');
    }
}
