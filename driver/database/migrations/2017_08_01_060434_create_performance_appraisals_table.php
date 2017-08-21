<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_appraisal_info', function (Blueprint $table) {
            $table->increments('id');
            $table->text('appraiser');
            $table->text('comment')->nullable();
            $table->text('recommendations')->nullable();
            $table->integer('hired_driver_id')->references('id')->on('hired_driver');
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
        Schema::dropIfExists('performance_appraisal_info');
    }
}
