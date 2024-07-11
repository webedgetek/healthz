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
        Schema::create('attendance_services', function (Blueprint $table) {
            $table->id('att_service_id');
            $table->string('description',150); 
            $table->string('gender_id',50); 
            $table->string('age_id',50); 
            $table->string('child_code',50); 
            $table->string('adult_code',50); 
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
        Schema::dropIfExists('attendance_services');
    }
};
