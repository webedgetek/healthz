<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::inRandomOrder()->first(); 

        $age = Age::create([
            'age_id' => 'A1',
            'age_description' => 'CHILD',
            'min_age' => '3',
            'max_age' => '12',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $age = Age::create([
            'age_id' => 'A2',
            'age_description' => 'ADULT',
            'min_age' => '13',
            'max_age' => '1000',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $age = Age::create([
            'age_id' => 'A3',
            'age_description' => 'ALL',
            'min_age' => '0',
            'max_age' => '1000',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $age = Age::create([
            'age_id' => 'A4',
            'age_description' => 'INFANT',
            'min_age' => '0',
            'max_age' => '3',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $age = Age::create([
            'age_id' => 'A5',
            'age_description' => 'INFANT CHILD',
            'min_age' => '0',
            'max_age' => '12',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

    }
}
