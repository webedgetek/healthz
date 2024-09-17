<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create();
        
        $userdata = User::create([
            'user_id' => 'b2c362bf-56df-4337-be34-7062ffae8bd5',
            'username' => 'admin',
            'password'  => '$2y$10$V4.AAnGPPrhLLJsBT28H3.1vF9rpK25BnMr5v420szqNbIWVNq9k6',   //@Mohammed200535
            'oldpassword' => 'Mohammed',
            'firstname' => 'Mohammed',
            'othername' => 'Alhassan',
            'email' => 'bigboss200535@gmail.com',
            'telephone' => '0245340461',
            'gender' => 'Male',
            'mode' => 'New',
            'salt' => 'systemsalt',
            'role' => 'Developer',
            // 'permission' => 'ontheway',
            // 'image' => $faker->imageUrl(),
            'added_id' => 'b2c362bf-56df-4337-be34-7062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
    }
}
