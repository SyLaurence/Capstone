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
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',20);
            $table->string('middle_name',20)->nullable();
            $table->string('last_name',20);
            $table->smallInteger('sex');
            $table->string('citizenship',20);
            $table->date('date_of_birth');
            $table->text('place_of_birth');
            $table->float('weight_kilo', 6,2);
            $table->float('height_ft', 6,2);
            $table->string('religion',20);
            $table->string('sss_id',12);
            $table->string('tin_id',15);
            $table->string('philhealth',12);
            $table->string('pagibig',14);
            $table->string('residence_type',20);
            $table->text('email')->nullable();
            $table->text('image_path');
            $table->string('civil_status',10);
            $table->string('language',10);
            $table->text('contact_no');
            $table->integer('applicants_id')->references('id')->on('applicants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_infos');
    }
}
