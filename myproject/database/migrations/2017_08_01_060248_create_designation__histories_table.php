<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblDesignationRecord', function (Blueprint $table) {
            $table->increments('intDRDID');
            $table->date('dtDRDEndDate')->nullable();
            $table->integer('intDRDCBID')->references('intCBID')->on('tblCompanyBrand');
            $table->integer('intDRCAPPID')->references('intAPPID')->on('tblApplicant');
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
        Schema::dropIfExists('tblDesignationRecord');
    }
}
