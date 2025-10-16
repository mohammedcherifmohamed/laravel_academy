<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
public function run(): void
{
    // Clear existing users
    \App\Models\User::truncate();

    User::factory()->create([
    'name' => 'Test User',
    'email' => 'test' . uniqid() . '@example.com',
]);


    $this->call([
        QuizeSeeder::class,
        CategorySeeder::class,
        InstructorSeeder::class,
        CourseSeeder::class,
        CourseOverviewSeeder::class,
        QuestionSeeder::class,
        UserSeeder::class,
    ]);
}

}
