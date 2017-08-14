<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblUser', function (Blueprint $table) {
            $table->increments('intUSRID');
            $table->string('strUSRName',20);
            $table->string('strUSRFName',20);
            $table->string('strUSRMName',20)->nullable();
            $table->string('strUSRLName',20);
            $table->string('strUSREmail',50)->unique();
            $table->text('txtUSRContactNo');
            $table->text('txtUSRPassword');
            $table->smallInteger('intUSRLevel');
            $table->text('txtUSRImagePath')->nullable();
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
        Schema::dropIfExists('tblUser');
    }
}
