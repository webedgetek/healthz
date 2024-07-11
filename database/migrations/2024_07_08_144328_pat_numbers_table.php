<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('patient_nos', function (Blueprint $table) {
            $table->string('patient_id', 50);
            $table->string('opd_number', 50);
            $table->string('clinic_code', 100)->nullable();
            $table->date('registration_date')->nullable();
            $table->timestamp('registration_time')->nullable();
            $table->string('user_id', 100)->nullable();
            $table->string('added_id', 100)->nullable();
            $table->timestamp('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->string('status', 100)->default('Active');
            $table->string('archived', 100)->default('No');
            $table->string('archived_id', 100)->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->date('archived_date', 100)->nullable();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('patient_id')->references('patient_id')->on('patient_info');
            // $table->primary('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('patient_nos');
    }
};
