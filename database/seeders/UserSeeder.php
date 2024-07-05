<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'id' => '0012458-12541-6541258',
            'username' => 'mohammed',
            'password'  => '$2y$10$V4.AAnGPPrhLLJsBT28H3.1vF9rpK25BnMr5v420szqNbIWVNq9k6',   //@Mohammed200535
            'firstname' => 'Mohammed',
            'othername' => 'Alhassan',
            'email' => 'bigboss200535@gmail.com',
            'telephone' => '0245340461',
            'gender' => 'Male',
            'mode' => 'New',
            'salt' => 'systemsalt',
            'role' => 'Developer',
            'permission' => 'ontheway',
            'image' => $faker->imageUrl(),
            'added_id' => '1',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
    }
}
