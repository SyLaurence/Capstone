<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblReferer', function (Blueprint $table) {
            $table->integer('intREFPNFOID')->references('intPNFOID')->on('tblPersonalInfo');
            $table->text('txtREFName');
            $table->text('txtREFOccupation');
            $table->text('txtREFAddress');
            $table->text('txtREFContactNo');
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
        Schema::dropIfExists('tblReferer');
    }
}
