<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([
            ['name' => 'Laravel Basics', 'icon' => 'laravel.svg', 'quize_type' => 1],
            ['name' => 'Data Science', 'icon' => 'data.svg', 'quize_type' => 2],
            ['name' => 'Machine Learning', 'icon' => 'ml.svg', 'quize_type' => 2],
            ['name' => 'Web Design', 'icon' => 'design.svg', 'quize_type' => 4],
        ]);
    }
}
