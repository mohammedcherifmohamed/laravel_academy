<?php

namespace Database\Seeders;
use App\Models\Student;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'age' => 22,
        ]);

        Student::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'age' => 24,
        ]);
    }
}
