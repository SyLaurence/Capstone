<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblEducBackground', function (Blueprint $table) {
            $table->integer('intEDBGPNFOID')->references('intPNFOID')->on('tblPersonalInfo');
            $table->integer('intEDBGLevel');
            $table->text('txtEDBGSName');
            $table->text('txtEDBGSAddress');
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
        Schema::dropIfExists('tblEducBackground');
    }
}
