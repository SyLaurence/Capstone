<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceEvalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_eval_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->int('personal_infos_id');
            $table->date('date');
            $table->text('recommendation');
            $table->text('comment');
            $table->int('level');
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
        Schema::dropIfExists('performance_eval_infos');
    }
}
