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
        Schema::create('performanceappraisal', function (Blueprint $table) {
            $table->integer('score');
            $table->integer('appraisalcriteria_id')->references('id')->on('appraisalcriteria');
            $table->integer('performanceappraisalinfo_id')->references('id')->on('performanceappraisalinfo');
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
        Schema::dropIfExists('performanceappraisal');
    }
}
