<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course')->insert([
            [
                'title' => 'Learn Laravel From Scratch',
                'description' => 'A complete beginner course to build modern web apps with Laravel.',
                'image_path' => 'courses/laravel.jpg',
                'price' => 49.99,
                'category_id' => 1,
                'instructor_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Data Science for Everyone',
                'description' => 'Explore the world of data with Python and visualization tools.',
                'image_path' => 'courses/data_science.jpg',
                'price' => 59.99,
                'category_id' => 2,
                'instructor_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Machine Learning Bootcamp',
                'description' => 'Hands-on projects and real examples for aspiring ML engineers.',
                'image_path' => 'courses/ml.jpg',
                'price' => 79.99,
                'category_id' => 3,
                'instructor_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
