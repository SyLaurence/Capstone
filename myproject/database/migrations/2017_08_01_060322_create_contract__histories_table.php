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
        Schema::create('contract_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hired_driver_id')->references('id')->on('hired_driver');
            $table->integer('performance_appraisals_id')->references('id')->on('performance_appraisals');
            $table->date('end_date');
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
        Schema::dropIfExists('contract_histories');
    }
}
