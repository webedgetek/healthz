<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Religion;
use App\Models\User;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::inRandomOrder()->first(); 

        $region = Religion::create([
            'region_id' => 'R001',
            'region' => 'Islam',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $region = Religion::create([
            'region_id' => 'R002',
            'region' => 'Christianity',
            'added_date' => now(),
            'user_id' => $user->user_id,
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $region = Religion::create([
            'region_id' => 'R003',
            'region' => 'Atheist',
            'added_date' => now(),
            'user_id' => $user->user_id,
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $region = Religion::create([
            'region_id' => 'R004',
            'region' => 'Hinduism',
            'added_date' => now(),
            'user_id' => $user->user_id,
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $region = Religion::create([
            'region_id' => 'R005',
            'region' => 'Judaism',
            'added_date' => now(),
            'user_id' => $user->user_id,
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $region = Religion::create([
            'region_id' => 'R006',
            'region' => 'Traditional',
            'added_date' => now(),
            'user_id' => $user->user_id,
            'status' => 'Active',
            'archived' => 'No',
        ]);
    }
}
