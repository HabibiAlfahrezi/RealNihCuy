<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => 'Admin', // Set the name to 'Admin'
            'email' => 'admins@gmail.com', // Set the email to 'admin@gmail.com'
            'password' => bcrypt('habibi123'),
            'prosesi' => 'admin',
            'created_at' => now(), // Optionally set to now()
            'updated_at' => now(), // Optionally set to now()
        ];
    }

}