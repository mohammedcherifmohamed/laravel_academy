<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('instructor')->insert([
            [
                'full_name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'gender' => 'male',
                'specialization' => 'Web Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Sara Lee',
                'email' => 'sara@example.com',
                'password' => Hash::make('password'),
                'gender' => 'female',
                'specialization' => 'Data Science',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Ahmed Karim',
                'email' => 'ahmed@example.com',
                'password' => Hash::make('password'),
                'gender' => 'male',
                'specialization' => 'AI & ML',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
