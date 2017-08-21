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
        Schema::create('designationrecord', function (Blueprint $table) {
            $table->increments('id');
            $table->date('enddate')->nullable();
            $table->integer('companybrand_id')->references('id')->on('companybrand');
            $table->integer('applicant_id')->references('id')->on('applicant');
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
        Schema::dropIfExists('designationrecord');
    }
}
