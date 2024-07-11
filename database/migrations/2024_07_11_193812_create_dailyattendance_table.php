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
        Schema::create('daily_attendance', function (Blueprint $table) {
            $table->string('patient_id', 50);
            $table->string('opd_number', 50);
            $table->date('attendance_date');
            $table->timestamp('attendance_time'); 
            $table->string('pat_age'); 
            $table->string('status_code'); 
            $table->string('reg_type'); 
            $table->string('reg_status'); 
            $table->string('membership_number'); 
            $table->string('insured'); 
            $table->string('claims_check_code'); 
            $table->string('episode_id'); 
            $table->string('sponsor_id'); 
            $table->string('clinic_code'); 
            $table->string('records_no'); 
            $table->string('attendance_no'); 
            $table->string('gender_id',50); 
            $table->string('age_id',50); 
            $table->string('child_code',50)->nullable(); 
            $table->string('adult_code',50)->nullable(); 
            $table->string('user_id',50)->nullable();        
            $table->string('added_id', 50)->nullable();
            $table->string('added_by', 100)->nullable();
            $table->date('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->date('updated_date')->nullable();
            $table->string('status', 100)->default('Active');
            $table->string('archived', 100)->default('No');
            $table->date('archived_date')->nullable();
            $table->string('archived_by', 100)->nullable();
            // $table->primary('relation_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('age_id')->references('age_id')->on('ages');
            $table->foreign('gender_id')->references('gender_id')->on('gender');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_attendance');
    }
};
