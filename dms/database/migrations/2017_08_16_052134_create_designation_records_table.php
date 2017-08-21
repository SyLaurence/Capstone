<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignationRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designation_records', function (Blueprint $table) {
            $table->increments('id');
            $table->date('end_date')->nullable();
            $table->integer('company_brand_id')->references('id')->on('company_brand');
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
        Schema::dropIfExists('designation_records');
    }
}
