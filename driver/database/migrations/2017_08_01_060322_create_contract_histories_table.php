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
        Schema::create('contract_record', function (Blueprint $table) {
            $table->increments('id');
            $table->date('enddate')->nullable();
            $table->integer('hired_driver_id')->references('id')->on('hired_driver');
            $table->integer('performance_appraisal_info_id')->references('id')->on('performance_appraisal_info')->nullable();
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
        Schema::dropIfExists('contract_record');
    }
}
