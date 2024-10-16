<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tech>
 */
class TechFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'JavaScript',
                'Python',
                'Java',
                'C++',
                'Ruby',
                'PHP',
                'C#',
                'Swift',
                'Go',
                'TypeScript',
            ]),
            'logo' => $this->faker->randomElement([
                'img/javascript.png',
                'img/python.png',
                'img/java.png',
                'img/cplus.png',
                'img/ruby.png',
                'img/php.png',
                'img/csharp.png',
                'img/swift.png',
                'img/golang.png',
                'img/typescript.png',
            ]),
        ];
    }
}
