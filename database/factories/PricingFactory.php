<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pricing>
 */
class PricingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => $this->faker->word(),
            // 'description' => $this->faker->sentence(),
            // 'price' => $this->faker->numberBetween(10, 500),
            // 'billing_cycle' => $this->faker->randomElement(['monthly', 'yearly']),
            // 'features' => json_encode([
            //     'Team size' => $this->faker->numberBetween(1, 100),
            //     'Free updates' => $this->faker->word,
            //     'Premium support' => $this->faker->word,
            //     'Individual configuration' => $this->faker->boolean,
            //     'No setup, or hidden fees' => $this->faker->boolean,
            // ]),
        ];
    }
}
