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
       Schema::create('patient_info', function (Blueprint $table) {
            $table->string('patient_id', 50);
            $table->string('title', 100);
            $table->string('firstname', 100);
            $table->string('middlename', 100);
            $table->string('lastname', 100);
            $table->date('dob');
            $table->string('age');
            $table->string('dependant', 50)->nullable();
            $table->string('sponsor_type', 100);
            $table->string('sponsor_name', 100);
            $table->string('membership_number', 150);
            $table->string('gender', 150);
            $table->string('fullname')->virtualAs("CONCAT(title, ' ', firstname, ' ', middlename, ' ', lastname)");
            $table->string('telephone', 50)->nullable();
            $table->string('contact_person', 50)->nullable();
            $table->string('contact_person_telephone', 50)->nullable();
            $table->string('contact_relationship')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('email_verified', 20)->nullable();
            $table->string('allow_sms', 50)->nullable();
            $table->string('allow_email', 50)->nullable();
            $table->string('records_id', 100)->nullable();
            $table->string('user_id', 100)->nullable();
            $table->timestamp('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->string('status', 100)->default('Active');
            $table->string('archived', 100)->default('No');
            $table->string('archived_id', 100)->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->date('archived_date', 100)->nullable();
            $table->primary('patient_id');
             $table->foreign('user_id')->references('user_id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_info');
    }
};
