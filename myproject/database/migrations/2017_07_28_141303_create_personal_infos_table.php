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
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->int('sex');
            $table->string('citizenship');
            $table->date('date_of_birth');
            $table->text('place_of_birth');
            $table->double('weight_kilo');
            $table->double('height_ft');
            $table->string('religion');
            $table->string('sss_id');
            $table->string('tin_id');
            $table->string('philhealth');
            $table->string('pagibig');
            $table->string('residence_type');
            $table->text('email');
            $table->text('image_path');
            $table->string('civil_status');
            $table->string('language');
            $table->text('contact_no');
            $table->int('user_id');
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
        Schema::dropIfExists('personal_infos');
    }
}
