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
        Schema::create('performance_appraisal_criterias', function (Blueprint $table) {
            $table->integer('appraisal_criterias_id')->references('id')->on('appraisal_criterias');
            $table->integer('score');
            $table->integer('performance_appraisals_id')->references('id')->on('performance_appraisals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performance_appraisal_criterias');
    }
}
