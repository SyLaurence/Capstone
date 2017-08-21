<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referer', function (Blueprint $table) {
            $table->integer('personalinfo_id')->references('id')->on('personalinfo');
            $table->text('name');
            $table->text('occupation');
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
        Schema::dropIfExists('referer');
    }
}
