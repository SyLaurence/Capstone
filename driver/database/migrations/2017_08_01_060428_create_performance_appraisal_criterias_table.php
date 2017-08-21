<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceAppraisalCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_appraisal', function (Blueprint $table) {
            $table->integer('score');
            $table->integer('appraisal_criteria_id')->references('id')->on('appraisal_criteria');
            $table->integer('performance_appraisal_info_id')->references('id')->on('performance_appraisal_info');
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
        Schema::dropIfExists('performance_appraisal');
    }
}
