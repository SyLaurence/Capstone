<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_records', function (Blueprint $table) {
            $table->increments('id');
            $table->date('end_date')->nullable();
            $table->integer('hired_driver_id')->references('id')->on('hired_driver');
            $table->integer('appraisal_id')->references('id')->on('appraisal')->nullable();
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
        Schema::dropIfExists('contract_records');
    }
}
