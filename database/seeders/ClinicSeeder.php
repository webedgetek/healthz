<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Age;
use App\Models\User;
use App\Models\Gender;
use App\Models\Clinic;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::inRandomOrder()->first(); 
        $gender = Gender::inRandomOrder()->first(); 
        $age = Age::inRandomOrder()->first(); 

        $service = Clinic::create([
            'clinic_id' => '01',
            'clinic' => 'General',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => '02',
            'clinic' => 'Direct Service',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => '03',
            'clinic' => 'Antenatal',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => '04',
            'clinic' => 'Postnatal',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => '05',
            'clinic' => 'In-patient',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => '06',
            'clinic' => 'Physiotherapy',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => '07',
            'clinic' => 'Eye',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => '08',
            'clinic' => 'Paediatric',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => '09',
            'clinic' => 'Gynaecology',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => '10',
            'clinic' => 'ENT',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => '11',
            'clinic' => 'Dental',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => '12',
            'clinic' => 'Medical',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => '17',
            'clinic' => 'Diabetic',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => '13',
            'clinic' => 'Emergency',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => '14',
            'clinic' => 'Psychiatric',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => '15',
            'clinic' => 'Maternity',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => '16',
            'clinic' => 'Direct Pharmacy',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        // $service = Clinic::create([
        //     'clinic_id' => '17',
        //     'clinic' => 'Direct Pharmacy',
        //     'gender_id' => $gender->gender_id,
        //     'age_id' => $age->age_id,
        //     'user_id' => $user->user_id,
        //     'added_date' => now(),
        //     'status' => 'Active',
        //     'archived' => 'No',
        // ]);

    }
}
