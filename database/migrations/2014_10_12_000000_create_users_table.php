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
            $table->string('firstname', 150);
            $table->string('othername', 150);
            $table->string('name')->virtualAs("CONCAT(firstname, ' ', othername)");
            $table->string('username', 150);
            $table->string('password', 100);
            $table->string('salt', 100)->nullable();
            $table->string('telephone', 50);
            $table->string('gender', 100);
            $table->string('mode', 100);
            $table->string('mode', 100);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at', 50)->nullable();
            $table->string('added_id', 100);
            $table->string('added_date', 100);
            $table->string('udpated_by', 100);
            $table->string('status', 100);
            $table->string('archived', 100);
            $table->string('archived_by', 100);
            $table->date('archived_date', 100);
            // $table->rememberToken();
            // $table->timestamps();
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
