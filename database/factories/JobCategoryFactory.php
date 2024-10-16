<?php

namespace Database\Factories;

use App\Models\JobCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class JobCategoryFactory extends Factory
{
    protected $model = JobCategory::class;

    public function definition()
    {
        // Ambil daftar kategori dan ikon dari file konfigurasi
        $icons = config('category_icons');
        
        // Ambil nama kategori secara acak dari kunci konfigurasi
        $categoryName = Arr::random(array_keys($icons));

        // Pilih ikon yang sesuai dengan nama kategori
        $iconClass = $icons[$categoryName];

        return [
            'title' => $categoryName,
            'icon' => $iconClass, // Tambahkan ikon ke data yang dihasilkan
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
