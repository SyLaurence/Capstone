<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblContractRecord', function (Blueprint $table) {
            $table->increments('intCRDID');
            $table->date('dtCRDEndDate');
            $table->integer('intCRDHDRID')->references('intHDRID')->on('tblHiredDriver');
            $table->integer('intCRDPFPID')->references('intPFPID')->on('tblPerformanceAppraisalInfo')->nullable();
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
        Schema::dropIfExists('tblContractRecord');
    }
}
