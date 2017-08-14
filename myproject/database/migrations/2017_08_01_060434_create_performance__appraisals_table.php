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
        Schema::create('tblPerformanceAppraisalInfo', function (Blueprint $table) {
            $table->increments('intPFPID');
            $table->text('txtPFPAppraiser');
            $table->text('txtPFPComment')->nullable();
            $table->text('txtPFPRecommendations')->nullable();
            $table->integer('intPFPHDRID')->references('intHDRID')->on('tblHiredDriver');
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
        Schema::dropIfExists('tblPerformanceAppraisalInfo');
    }
}
