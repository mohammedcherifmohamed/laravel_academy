<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseOverviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_overview')->insert([
            [
                'duration' => '12 hours',
                'lessons' => '35',
                'level' => 'beginner',
                'requirements' => 'Basic PHP knowledge',
                'old_price' => '99.99',
                'will_learn' => 'Building Laravel projects',
                'course_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'duration' => '18 hours',
                'lessons' => '40',
                'level' => 'intermediate',
                'requirements' => 'Python basics',
                'old_price' => '89.99',
                'will_learn' => 'Data visualization and analysis',
                'course_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
