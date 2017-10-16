<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id')->references('id')->on('applicant');
            $table->integer('user_id')->references('id')->on('user');
            $table->smallInteger('for');
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
        Schema::dropIfExists('holds');
    }
}
