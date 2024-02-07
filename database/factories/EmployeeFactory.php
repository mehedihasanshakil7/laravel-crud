<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'job_title' => fake()->jobTitle,
            'joining_date' => fake()->date,
            'salary' => fake()->randomFloat(2, 30000, 90000), // Adjust the salary range as needed
            'email' => fake()->optional()->safeEmail,
            'mobile_no' => fake()->phoneNumber,
            'address' => fake()->address,
        ];
    }
}
