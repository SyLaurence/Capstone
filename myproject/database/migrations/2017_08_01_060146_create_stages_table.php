<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblStage', function (Blueprint $table) {
            $table->increments('intSTGID');
            $table->date('dtSTGEndDate')->nullable();
            $table->integer('intSTGSSPID')->references('intSSPID')->on('tblStageSetup');
            $table->integer('intSTGRECID')->references('intRECID')->on('tblRecruitment');
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
        Schema::dropIfExists('tblStage');
    }
}
