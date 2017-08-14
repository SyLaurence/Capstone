<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblRecruitment', function (Blueprint $table) {
            $table->increments('intRECID');
            $table->date('dtRECEndDate')->nullable();
            $table->integer('intRECAPPID')->references('intAPPID')->on('tblApplicant');
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
        Schema::dropIfExists('tblRecruitment');
    }
}
