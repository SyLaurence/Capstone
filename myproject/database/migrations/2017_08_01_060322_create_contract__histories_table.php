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
        Schema::create('contractrecord', function (Blueprint $table) {
            $table->increments('id');
            $table->date('enddate')->nullable();
            $table->integer('hireddriver_id')->references('id')->on('hireddriver');
            $table->integer('performanceappraisalinfo_id')->references('id')->on('performanceappraisalinfo')->nullable();
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
        Schema::dropIfExists('contractrecord');
    }
}
