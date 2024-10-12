<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $level = rand(1, 4);
        $year = today()->subYears($level);
        $gender = rand(1, 2);
        if ($gender == 1)
            $gender = 'Male';
        else
            $gender = 'Female';

        return [
            'surname' => fake()->firstName(),
            'other_names' => fake()->lastName(),
            'phone' => 0 . rand(7, 9) . rand(0, 1) . rand(11111111, 99999999),
            'gender' => $gender,
            'dob' => fake()->date(),
            'reg_no' => '20' . rand(16, 23) . rand(109, 782) . rand(100, 999),
            'faculty_id' => rand(1, 4),
            'department_id' => rand(1, 4),
            'level' => $level,
            'state_of_origin' => fake()->city(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'year' => $year,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
