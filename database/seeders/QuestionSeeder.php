<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->insert([
            [
                'quize_id' => 1,
                'question_text' => 'What is Laravel?',
                'correct_answer' => 'A PHP framework',
            ],
            [
                'quize_id' => 1,
                'question_text' => 'What command creates a migration?',
                'correct_answer' => 'php artisan make:migration',
            ],
            [
                'quize_id' => 2,
                'question_text' => 'What is a matrix?',
                'correct_answer' => 'A rectangular array of numbers',
            ],
        ]);
    }
}
