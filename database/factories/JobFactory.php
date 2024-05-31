<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_title' => fake()->name,
            'user_id' => 1,
            'job_type_id' => rand(1,5),
            'category_id' => rand(1,10),
            'vacancy' => rand(1,10),
            'location' => fake()->city,
            'job_description' => fake()->text,
            'experience' => rand(1,10),
            'company_id' => rand(1,3),
            'company_email' => "example@company.net",
        ];
    }
}
