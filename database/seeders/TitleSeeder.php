<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Title;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender = Gender::inRandomOrder()->first(); 

        $titledata = Title::create([
            'title_id' => 't001',
            'title' => 'Mr',
            'gender_id' => $gender->gender_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = Title::create([
            'title_id' => 't002',
            'title' => 'Mrs',
            'gender_id' => $gender->gender_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = Title::create([
            'title_id' => 't003',
            'title' => 'Miss',
            'gender_id' => $gender->gender_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = Title::create([
            'title_id' => 't005',
            'title' => 'Dr',
            'gender_id' => $gender->gender_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = Title::create([
            'title_id' => 't006',
            'title' => 'Madam',
            'gender_id' => $gender->gender_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
    }
}
