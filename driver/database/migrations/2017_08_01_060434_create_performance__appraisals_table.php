<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performanceappraisalinfo', function (Blueprint $table) {
            $table->increments('id');
            $table->text('appraiser');
            $table->text('comment')->nullable();
            $table->text('recommendations')->nullable();
            $table->integer('hireddriver_id')->references('id')->on('hireddriver');
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
        Schema::dropIfExists('performanceappraisalinfo');
    }
}
