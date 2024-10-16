<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
    {
        return [
            // 'user_id' => User::factory(),
            // 'name' => $this->faker->company(),
            // 'logo' => $this->faker->name(),
        ];
    }


    


}