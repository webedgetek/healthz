<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Age;
use App\Models\User;
use App\Models\Sponsor;

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

        $sponsor = Sponsor::create([
            'sponsor_id' => 'P001',
            'sponsor_catgory' => 'Patient',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $sponsor = Sponsor::create([
            'sponsor_id' => 'N002',
            'sponsor_catgory' => 'Nhis',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $sponsor = Sponsor::create([
            'sponsor_id' => 'P003',
            'sponsor_catgory' => 'Private Insurance',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $sponsor = Sponsor::create([
            'sponsor_id' => 'PC04',
            'sponsor_catgory' => 'Private Company',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
    }
}
