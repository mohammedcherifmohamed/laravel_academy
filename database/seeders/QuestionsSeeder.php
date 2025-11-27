<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('questions')->insert([
            // -------------------------
            // English quiz (ID = 1)
            // -------------------------
            [
                'quize_id' => 1,
                'question_text' => 'What is the plural of "child"?',
            ],
            [
                'quize_id' => 1,
                'question_text' => 'Choose the correct sentence:',
            ],
            [
                'quize_id' => 1,
                'question_text' => 'What is the synonym of "happy"?',
            ],
            [
                'quize_id' => 1,
                'question_text' => 'Which word is an adjective?',
            ],
            [
                'quize_id' => 1,
                'question_text' => 'Fill in the blank: I _____ to school every day.',
            ],

            // -------------------------
            // French quiz (ID = 2)
            // -------------------------
            [
                'quize_id' => 2,
                'question_text' => 'Comment dit-on "apple" en français ?',
            ],
            [
                'quize_id' => 2,
                'question_text' => 'Quel est le pluriel de "cheval" ?',
            ],
            [
                'quize_id' => 2,
                'question_text' => 'Quelle phrase est correcte ?',
            ],
            [
                'quize_id' => 2,
                'question_text' => 'Quel est l’infinitif du verbe "manges" ?',
            ],
            [
                'quize_id' => 2,
                'question_text' => 'Comment dit-on "thank you" en français ?',
            ],

            // -------------------------
            // Coding quiz (ID = 3)
            // -------------------------
            [
                'quize_id' => 3,
                'question_text' => 'What does HTML stand for?',
            ],
            [
                'quize_id' => 3,
                'question_text' => 'Which of these is a JavaScript data type?',
            ],
            [
                'quize_id' => 3,
                'question_text' => 'What is the correct syntax to print in PHP?',
            ],
            [
                'quize_id' => 3,
                'question_text' => 'What does CSS stand for?',
            ],
            [
                'quize_id' => 3,
                'question_text' => 'Which symbol is used to start a comment in SQL?',
            ],
        ]);
    }
}
