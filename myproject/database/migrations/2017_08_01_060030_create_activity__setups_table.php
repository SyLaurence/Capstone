<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitySetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblActivitySetup', function (Blueprint $table) {
            $table->increments('intASPID');
            $table->string('strASPName',30);
            $table->integer('intASPNumber');
            $table->smallInteger('intASPPassingCriteria');
            $table->float('ftASPPassing', 5,2);
            $table->float('ftASPMaxRate', 5,2);
            $table->smallInteger('intASPRequireAppraiser');
            $table->smallInteger('intASPIsComputable');
            $table->smallInteger('intASPIsSkippable');
            $table->integer('intASPSSPID')->references('intSSPID')->on('tblStageSetup');
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
        Schema::dropIfExists('tblActivitySetup');
    }
}
