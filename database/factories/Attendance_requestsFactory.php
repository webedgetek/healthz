<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Gender;
use App\Models\Patient;
// use App\Models\Title;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Attendance_requestsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        $gender = Gender::inRandomOrder()->where('usage','=','1')->first();
        // $title = Title::inRandomOrder()->first();
        $patient = Patient::inRandomOrder()->first();

        return [
           'patient_id' => $patient->patient_id,
            'membership_number' => $patient->patient_id,
            'sponsor_type' => $this->faker->lastName,
            'sponsor_name' => $this->faker->lastName,
            'start_date' => $this->faker->date('Y-m-d'),
            'end_date'=>$this->faker->date('Y-m-d'),
            // 'gender_id'=>$gender->gender_id,
            'user_id' =>  $user->user_id,
        ];
    }
}
