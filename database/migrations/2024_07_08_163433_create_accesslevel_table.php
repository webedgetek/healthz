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
        Schema::create('access_level', function (Blueprint $table) {
            $table->string('user_no',50);
            $table->string('add',150); 
            $table->string('edit',150); 
            $table->string('view',150); 
            $table->string('delete',150); 
            $table->string('print',150); 
            $table->string('accesslevel',150); 
            $table->string('facility_id', 50)->nullable();
            $table->timestamp('registered_date')->nullable(); 
            $table->string('user_id',50);        
            $table->string('added_id', 50)->nullable();
            $table->string('added_by', 100)->nullable();
            $table->date('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->date('updated_date')->nullable();
            $table->string('status', 100)->default('Active');
            $table->string('archived', 100)->default('No');
            $table->date('archived_date')->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('facility_id')->references('facility_id')->on('facility');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_level');
    }
};
