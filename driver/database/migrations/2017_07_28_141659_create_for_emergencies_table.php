<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForEmergenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('for_emergency', function (Blueprint $table) {
            $table->integer('personal_info_id')->references('id')->on('personal_info');
            $table->string('person_to_notify',30);
            $table->string('relationship',10);
            $table->text('address');
            $table->text('contact_no');
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
        Schema::dropIfExists('for_emergency');
    }
}
