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
        Schema::create('professional_exams', function (Blueprint $table) {
            $table->integer('personal_info_id')->references('id')->on('personal_info');
            $table->date('date');
            $table->text('name');
            $table->text('license_no');
            $table->string('rating',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professional_exams');
    }
}
