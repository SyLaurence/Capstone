<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblActivity', function (Blueprint $table) {
            $table->increments('intACTID');
            $table->date('dtACTEndDate')->nullable();
            $table->text('txtACTAppraiser');
            $table->integer('intACTSTGID')->references('intSTGID')->on('tblStage');
            $table->integer('intACTASPID')->references('intASPID')->on('tblActivitySetup');
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
        Schema::dropIfExists('tblActivity');
    }
}
