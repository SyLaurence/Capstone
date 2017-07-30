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
        Schema::create('referers', function (Blueprint $table) {
            $table->int('personal_infos_id');
            $table->text('employee_name');
            $table->text('employee_occupation');
            $table->text('company_name');
            $table->text('company_address');
            $table->text('company_contact_no');
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
        Schema::dropIfExists('referers');
    }
}
