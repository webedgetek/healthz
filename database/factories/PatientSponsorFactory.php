<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatientSponsor>
 */
class PatientSponsorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $patient = Patient::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();
        // $title = Title::inRandomOrder()->first();
        // $religion = Religion::inRandomOrder()->first(); 

        return [
            'patient_id' => $patient->patient_id,
            'member_no' => $this->faker->randomNumber(8, true),
            'sponsor_type' => $this->faker->lastName,
            'sponsor_name' => $this->faker->lastName,
            'start_date' => $this->faker->date('Y-m-d'),
            'end_date'=>$this->faker->date('Y-m-d'),
            // 'gender_id'=>$gender->gender_id,
            'user_id' =>  $user->user_id,
        ];
    }
}
