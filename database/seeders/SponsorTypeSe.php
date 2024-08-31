<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Age;
use App\Models\User;
use App\Models\SponsorType;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::inRandomOrder()->first(); 

        $sponsor = SponsorType::create([
            'sponsor_type_id' => 'P001',
            'sponsor_type' => 'Cash',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $sponsor = SponsorType::create([
            'sponsor_type_id' => 'N002',
            'sponsor_type' => 'Nhis',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $sponsor = SponsorType::create([
            'sponsor_type_id' => 'P003',
            'sponsor_type' => 'Private Insurance',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $sponsor = SponsorType::create([
            'sponsor_type_id' => 'PC04',
            'sponsor_type' => 'Private Company',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
    }
}
