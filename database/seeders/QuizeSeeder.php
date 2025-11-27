<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('quizes')->insert([
            [
                'quize_type' => 'English',
                'quize_level' => 'Beginner',
            ],
            [
                'quize_type' => 'French',
                'quize_level' => 'Intermediate',
            ],
            [
                'quize_type' => 'Coding',
                'quize_level' => 'Beginner',
            ],
        ]);
    }
}
