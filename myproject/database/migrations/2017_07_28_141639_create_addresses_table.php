<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblAddress', function (Blueprint $table) {
            $table->integer('intADDPNFOID')->references('intPNFOID')->on('tblPersonalInfo');
            $table->string('strADDType',20);
            $table->text('txtADDress');
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
        Schema::dropIfExists('tblAddress');
    }
}
