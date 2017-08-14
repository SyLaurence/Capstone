<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubActivitySetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblSubActivitySetup', function (Blueprint $table) {
            $table->increments('intSAPID');
            $table->string('strSAPName',30);
            $table->integer('intSAPMaxValue')->nullable();
            $table->integer('intSAPMinValue')->nullable();
            $table->smallInteger('intSAPType');
            $table->integer('intSAPASPID')->references('intASPID')->on('tblActivitySetup');
            $table->softDeletes();
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
        Schema::dropIfExists('tblSubActivitySetup');
    }
}
