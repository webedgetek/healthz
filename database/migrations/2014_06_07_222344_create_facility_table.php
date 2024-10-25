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
        Schema::create('facility', function (Blueprint $table) {
            $table->string('facility_id', 50);
            $table->string('facility_name', 150)->nullable();
            $table->string('nhis_api', 150)->nullable();
            $table->string('nhia_url', 150)->nullable();
            $table->string('nhia_key', 150)->nullable();
            $table->string('nhia_secret', 150)->nullable();
            $table->string('nhia_desc', 150)->nullable();
            $table->string('user_id', 50)->nullable();
            $table->string('ccc_type', 50)->nullable();
            $table->string('levels', 100)->nullable();
            $table->string('added_id', 100)->nullable();
            $table->timestamp('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->string('status', 100)->default('Active')->index();
            $table->string('archived', 100)->default('No')->index();
            $table->string('archived_id', 100)->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->date('archived_date', 100)->nullable();
            $table->primary('facility_id');
            // $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facility');
    }
};
