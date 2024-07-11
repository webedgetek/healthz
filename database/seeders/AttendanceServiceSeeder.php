<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AttendanceService;
use App\Models\User;

class AttendanceServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::inRandomOrder()->first(); 

        $gender = AttendanceService::create([
            'gender_id' => '1',
            'gender' => 'All',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
    }
}
