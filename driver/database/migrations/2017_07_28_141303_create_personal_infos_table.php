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
        Schema::create('personal_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',20);
            $table->string('middle_name',20)->nullable();
            $table->string('last_name',20);
            $table->string('extension_name',5)->nullable();
            $table->smallInteger('sex');
            $table->string('citizenship',20);
            $table->date('dob');
            $table->text('pob');
            $table->float('weight', 6,2);
            $table->float('height', 6,1);
            $table->string('religion',20);
            $table->string('sss_id',12);
            $table->string('tin_id',15);
            $table->string('philhealth',12);
            $table->string('pagibig',14);
            $table->string('residence_type',20);
            $table->text('image_path');
            $table->string('civil_status',10);
            $table->text('contact_no');
            $table->integer('applicant_id')->references('id')->on('applicant');
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
        Schema::dropIfExists('personal_info');
    }
}
