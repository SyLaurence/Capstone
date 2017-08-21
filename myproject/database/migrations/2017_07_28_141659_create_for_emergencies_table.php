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
        Schema::create('foremergency', function (Blueprint $table) {
            $table->integer('personalinfo_id')->references('id')->on('personalinfo');
            $table->string('persontonotify',30);
            $table->string('relationship',10);
            $table->text('address');
            $table->text('contactno');
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
        Schema::dropIfExists('foremergency');
    }
}
