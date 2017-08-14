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
        Schema::create('tblPerformanceAppraisal', function (Blueprint $table) {
            $table->integer('intPFAScore');
            $table->integer('intPFAAPCID')->references('intAPCID')->on('tblAppraisalCriteria');
            $table->integer('intPFAPFPID')->references('intPFPID')->on('tblPerformanceAppraisalInfo');
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
        Schema::dropIfExists('tblPerformanceAppraisal');
    }
}
