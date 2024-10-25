<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::unprepared(
            'CREATE PROCEDURE IF NOT EXISTS GetUsers()
              BEGIN 
              SELECT * FROM users;
             END;'
        );

        DB::unprepared(
            'CREATE PROCEDURE IF NOT EXISTS GetUsersById(IN `user_id` CHAR)
              BEGIN 
              SELECT * FROM users WHERE users.user_id = user_id;
             END;'
        );

        DB::unprepared(
            'CREATE PROCEDURE IF NOT EXISTS GetUsersByRole(IN `role` CHAR)
              BEGIN 
              SELECT * FROM users.role WHERE role = role;
             END;'
        );

        DB::unprepared(
            'CREATE PROCEDURE IF NOT EXISTS GetUsersByStatus(IN `status` CHAR)
              BEGIN 
              SELECT * FROM users.status WHERE status = status;
             END;'
        );

        DB::unprepared(
            'CREATE PROCEDURE IF NOT EXISTS GetPatients()
              BEGIN 
              SELECT * FROM patient_info;
             END;'
        );

        DB::unprepared(
            'CREATE PROCEDURE IF NOT EXISTS GetPatientWithPatNumbers()
              BEGIN 
                SELECT patient_info.patient_id, patient_info.fullname, patient_info.birth_date,
                patient_info.occupation, patient_info.education, patient_info.gender_id, patient_info.nationality,
                patient_info.death_status, patient_info.telephone, patient_info.email, patient_info.address, 
                patient_info.status, patient_info.archived, patient_info.contact_person, patient_info.contact_telephone, 
                patient_info.contact_relationship, 
                patient_nos.opd_number, patient_nos.clinic_code FROM patient_info left join patient_nos on 
                patient_info.patient_id = patient_nos.patient_id;
             END;'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared(
            'DROP PROCEDURE IF EXISTS GetUsers;'
        );

        DB::unprepared(
            'DROP PROCEDURE IF EXISTS GetUsersById;'
        );

        DB::unprepared(
            'DROP PROCEDURE IF EXISTS GetUsersByRole;'
        );

        DB::unprepared(
            'DROP PROCEDURE IF EXISTS GetUsersByStatus;'
        );

        DB::unprepared(
            'DROP PROCEDURE IF EXISTS GetPatients;'
        );

        DB::unprepared(
            'DROP PROCEDURE IF EXISTS GetPatientWithPatNumbers;'
        );

    }
};
