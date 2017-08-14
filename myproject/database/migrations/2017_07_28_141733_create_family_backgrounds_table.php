<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblFamBackground', function (Blueprint $table) {
            $table->integer('intFAMPNFOID')->references('intPNFOID')->on('tblPersonalInfo');
            $table->string('strFAMRelationship',10);
            $table->string('strFAMName',30);
            $table->date('dtFAMDateOfBirth');
            $table->text('txtFAMAddress');
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
        Schema::dropIfExists('tblFamBackground');
    }
}
