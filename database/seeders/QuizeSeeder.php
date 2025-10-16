<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quizes')->insert([
            ['quize_type' => 'Programming', 'quize_level' => 'beginner'],
            ['quize_type' => 'Mathematics', 'quize_level' => 'intermediate'],
            ['quize_type' => 'Physics', 'quize_level' => 'advanced'],
            ['quize_type' => 'Web Development', 'quize_level' => 'beginner'],
        ]);
    }
}
