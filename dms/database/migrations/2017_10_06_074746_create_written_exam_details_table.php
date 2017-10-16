<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWrittenExamDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('written_exam_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('written_exam_id')->references('id')->on('written_exam');
            $table->integer('question_id')->references('id')->on('question');
            $table->integer('choice_id')->references('id')->on('choice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('written_exam_details');
    }
}
