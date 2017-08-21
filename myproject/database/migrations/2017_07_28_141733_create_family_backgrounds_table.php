<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fambackground', function (Blueprint $table) {
            $table->integer('personalinfo_id')->references('id')->on('personalinfo');
            $table->string('relationship',10);
            $table->string('name',30);
            $table->date('dateofbirth');
            $table->text('address');
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
        Schema::dropIfExists('fambackground');
    }
}
