<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\Sponsors;
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
        $sponsors = Sponsors::inRandomOrder()->first();
        // $religion = Religion::inRandomOrder()->first(); 

        return [
            'patient_id' => $patient->patient_id,
            'member_no' => $this->faker->randomNumber(8, true),
            'sponsor_id' => $sponsors->sponsor_id,
            'start_date' => $this->faker->date('Y-m-d'),
            'end_date'=>$this->faker->date('Y-m-d'),
            'user_id' =>  $user->user_id,
        ];
    }
}
