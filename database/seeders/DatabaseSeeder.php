<?php

namespace Database\Seeders;

use App\Models\SponsorType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(40)->create();

         $this->call([
            UserSeeder::class,
            GenderSeeder::class,
            HealthFacilitySeeder::class,
            TitleSeeder::class,
            ReligionSeeder::class,
            RelationSeeder::class,
            AgeSeeder::class,
            AttendanceServiceSeeder::class,
            ClinicSeeder::class,
            SponsorTypeSeeder::class,
            SponsorsSeeder::class,
            ClinicAttendanceTypeSeeder::class,
            FacilitySeeder::class,
            ServicesSeeder::class,
            // ServiceFeeSeeder::class,
        ]);
        
        \App\Models\Patient::factory(200)->create();
        \App\Models\PatientSponsor::factory(50)->create();
        \App\Models\PatNumber::factory(100)->create();
    }
}
