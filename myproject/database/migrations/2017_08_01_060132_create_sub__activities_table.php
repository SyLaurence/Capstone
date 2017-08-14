<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblSubActivity', function (Blueprint $table) {
            $table->integer('intSACSAPID')->references('intSAPID')->on('tblSubActivitySetup');
            $table->integer('intSACACTID')->references('intACTID')->on('tblActivity');
            $table->integer('intSACValue');
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
        Schema::dropIfExists('tblSubActivity');
    }
}
