<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblProfessionalExam', function (Blueprint $table) {
            $table->integer('intPXMPNFOID')->references('intPNFOID')->on('tblPersonalInfo');
            $table->date('dtPXMDate');
            $table->text('txtPXMName');
            $table->text('txtPXMLicenseNo');
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
        Schema::dropIfExists('tblProfessionalExam');
    }
}
