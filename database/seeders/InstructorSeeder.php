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
                'full_name' => 'Mohamed',
                'email' => 'yureidevs42@example.com',
                'password' => Hash::make('aze'),
                'gender' => 'male',
                'specialization' => 'Web Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Djeloul Missoum',
                'email' => 'djeloul@example.com',
                'password' => Hash::make('aze'),
                'gender' => 'male',
                'specialization' => 'Networking',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Female instructor',
                'email' => 'mafsamarari@example.com',
                'password' => Hash::make('aze'),
                'gender' => 'female',
                'specialization' => 'AI & ML',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Women instructor',
                'email' => 'women@example.com',
                'password' => Hash::make('aze'),
                'gender' => 'female',
                'specialization' => 'Arabic',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'English Teacher',
                'email' => 'teacher@example.com',
                'password' => Hash::make('aze'),
                'gender' => 'female',
                'specialization' => 'English',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
