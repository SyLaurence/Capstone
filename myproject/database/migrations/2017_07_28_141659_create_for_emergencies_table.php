<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForEmergenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblForEmergency', function (Blueprint $table) {
            $table->integer('intFEMPNFOID')->references('intPNFOID')->on('tblPersonalInfo');
            $table->string('strFEMPersonToNotify',30);
            $table->string('strFEMRelationship',10);
            $table->text('txtFEMAddress');
            $table->text('txtFEMContactNo');
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
        Schema::dropIfExists('tblForEmergency');
    }
}
