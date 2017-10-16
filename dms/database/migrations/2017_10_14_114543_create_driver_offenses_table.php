<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverOffensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_offenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id')->references('id')->on('applicant');
            $table->integer('user_id')->references('id')->on('user');
            $table->integer('offense_id')->references('id')->on('offense');
            $table->text('comment');
            $table->dateTime('date');
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
        Schema::dropIfExists('driver_offenses');
    }
}
