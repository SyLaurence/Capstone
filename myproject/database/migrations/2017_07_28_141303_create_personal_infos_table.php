<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPersonalInfo', function (Blueprint $table) {
            $table->increments('intPNFOID');
            $table->string('strPNFOFName',20);
            $table->string('strPNFOMName',20)->nullable();
            $table->string('strPNFOLName',20);
            $table->string('strPNFOEName',5)->nullable();
            $table->smallInteger('intPNFOSex');
            $table->string('strPNFOCitizenship',20);
            $table->date('dtPNFODOB');
            $table->text('txtPNFOPOB');
            $table->float('ftPNFOWeightKG', 6,2);
            $table->float('ftPNFOHeightFT', 6,1);
            $table->string('strPNFOReligion',20);
            $table->string('strPNFOSSSID',12);
            $table->string('strPNFOTINID',15);
            $table->string('strPNFOPhilhealth',12);
            $table->string('strPNFOPagibig',14);
            $table->string('strPNFOResidenceType',20);
            $table->text('txtPNFOImagePath');
            $table->string('strPNFOCivilStatus',10);
            $table->text('txtPNFOContactNo');
            $table->integer('intPNFOAPPID')->references('intAPPID')->on('tblApplicant');
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
        Schema::dropIfExists('tblPersonalInfo');
    }
}
