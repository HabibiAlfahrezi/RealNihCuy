<?php

namespace Database\Factories;

use App\Models\JobType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobType>
 */
class JobTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $jobTypes = [
            'Full-Time',
            'Part-Time',
            'Contract',
            'Temporary',
            'Internship',
            'Freelance',
            'Remote',
            'Seasonal',
            'Commission-Based',
            'Shift Work',
            'Volunteer',
            'Apprenticeship',
        ];
        
        return [
            'title' => $this->faker->randomElement($jobTypes),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
