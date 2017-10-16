<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id')->references('id')->on('applicant');
            $table->integer('user_id')->references('id')->on('user');
            $table->integer('days');
            $table->smallInteger('is_available');
            $table->text('reason')->nullable();
            $table->dateTime('start_date');
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
        Schema::dropIfExists('applicant_leaves');
    }
}
