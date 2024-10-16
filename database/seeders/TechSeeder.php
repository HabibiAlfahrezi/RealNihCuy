<?php

namespace Database\Seeders;

use App\Models\Tech;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Define tech stacks to be created
       $techStacks = [
        'C++' => 'cplus.png',
        'C#' => 'csharp.png',
        'CSS' => 'css.png',
        'HTML' => 'html.png',
        'Golang' => 'golang.png',
        'Java' => 'java.png',
        'JavaScript' => 'javascript.png',
        'PHP' => 'php.png',
        'Python' => 'python.png',
        'Ruby' => 'ruby.png',
        'Swift' => 'swift.png',
        'TypeScript' => 'typescript.png',
        ];

        // Ensure uniqueness
        foreach ($techStacks as $name => $logo) {
            Tech::updateOrCreate(
                ['name' => $name],
                ['logo' => 'img/' . $logo]
            );
        }
    }
}
