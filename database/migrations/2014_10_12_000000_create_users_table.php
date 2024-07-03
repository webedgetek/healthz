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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 150);
            $table->string('password', 100);
            $table->string('firstname', 150);
            $table->string('othername', 150);
            $table->string('fullname')->virtualAs("CONCAT(firstname, ' ', othername)");
            $table->string('salt', 100)->nullable();
            $table->string('telephone', 50);
            $table->string('telephone_verified', 50)->nullable();
            $table->timestamp('telephone_verified_at')->nullable();
            $table->string('telephone', 50);
            $table->string('gender', 100);
            $table->string('role', 100);
            $table->string('mode', 100);
            $table->string('email')->unique();
            $table->string('email_verified', 20)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('added_id', 100)->nullable();
            $table->timestamp('added_date')->nullable();
            $table->string('udpated_by', 100);
            $table->string('status', 100)->default('Active');
            $table->string('archived', 100)->default('No');
            $table->string('archived_id', 100)->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->date('archived_date', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
