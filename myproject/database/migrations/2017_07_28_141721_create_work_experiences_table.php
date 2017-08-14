<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblWorkExperience', function (Blueprint $table) {
            $table->integer('intWXPPNFOID')->references('intPNFOID')->on('tblPersonalInfo');
            $table->text('txtWXPCompanyName');
            $table->text('txtWXPPosition');
            $table->date('dtWXPDateResigned');
            $table->text('txtWXPCompanyContactNo');
            $table->text('txtWXPReasonForLeaving');
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
        Schema::dropIfExists('tblWorkExperience');
    }
}
