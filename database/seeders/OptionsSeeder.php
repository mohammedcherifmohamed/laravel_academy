<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('options')->insert([
            // -------------------------
            // English quiz (Q5-Q9)
            // -------------------------
            // Q5: What is the plural of "child"?
            ['question_id' => 5, 'content' => 'Childs', 'is_correct' => false],
            ['question_id' => 5, 'content' => 'Children', 'is_correct' => true],
            ['question_id' => 5, 'content' => 'Childes', 'is_correct' => false],

            // Q6: Choose the correct sentence:
            ['question_id' => 6, 'content' => 'He go to school.', 'is_correct' => false],
            ['question_id' => 6, 'content' => 'He goes to school.', 'is_correct' => true],
            ['question_id' => 6, 'content' => 'He going to school.', 'is_correct' => false],

            // Q7: What is the synonym of "happy"?
            ['question_id' => 7, 'content' => 'Sad', 'is_correct' => false],
            ['question_id' => 7, 'content' => 'Joyful', 'is_correct' => true],
            ['question_id' => 7, 'content' => 'Angry', 'is_correct' => false],

            // Q8: Which word is an adjective?
            ['question_id' => 8, 'content' => 'Beautiful', 'is_correct' => true],
            ['question_id' => 8, 'content' => 'Run', 'is_correct' => false],
            ['question_id' => 8, 'content' => 'Dog', 'is_correct' => false],

            // Q9: Fill in the blank: I _____ to school every day.
            ['question_id' => 9, 'content' => 'go', 'is_correct' => true],
            ['question_id' => 9, 'content' => 'going', 'is_correct' => false],
            ['question_id' => 9, 'content' => 'gone', 'is_correct' => false],

            // -------------------------
            // French quiz (Q10-Q14)
            // -------------------------
            // Q10: Comment dit-on "apple" en français ?
            ['question_id' => 10, 'content' => 'Pomme', 'is_correct' => true],
            ['question_id' => 10, 'content' => 'Poire', 'is_correct' => false],
            ['question_id' => 10, 'content' => 'Orange', 'is_correct' => false],

            // Q11: Quel est le pluriel de "cheval" ?
            ['question_id' => 11, 'content' => 'Chevals', 'is_correct' => false],
            ['question_id' => 11, 'content' => 'Chevaux', 'is_correct' => true],
            ['question_id' => 11, 'content' => 'Chevale', 'is_correct' => false],

            // Q12: Quelle phrase est correcte ?
            ['question_id' => 12, 'content' => 'Je mange une pomme.', 'is_correct' => true],
            ['question_id' => 12, 'content' => 'Je mangee une pomme.', 'is_correct' => false],
            ['question_id' => 12, 'content' => 'Je manges une pomme.', 'is_correct' => false],

            // Q13: Quel est l’infinitif du verbe "manges" ?
            ['question_id' => 13, 'content' => 'Manger', 'is_correct' => true],
            ['question_id' => 13, 'content' => 'Manges', 'is_correct' => false],
            ['question_id' => 13, 'content' => 'Mang', 'is_correct' => false],

            // Q14: Comment dit-on "thank you" en français ?
            ['question_id' => 14, 'content' => 'Merci', 'is_correct' => true],
            ['question_id' => 14, 'content' => 'Bonjour', 'is_correct' => false],
            ['question_id' => 14, 'content' => 'Salut', 'is_correct' => false],

            // -------------------------
            // Coding quiz (Q15-Q19)
            // -------------------------
            // Q15: What does HTML stand for?
            ['question_id' => 15, 'content' => 'Hyperlinks Text Marking Language', 'is_correct' => false],
            ['question_id' => 15, 'content' => 'HyperText Markup Language', 'is_correct' => true],
            ['question_id' => 15, 'content' => 'Home Tool Markup Language', 'is_correct' => false],

            // Q16: Which of these is a JavaScript data type?
            ['question_id' => 16, 'content' => 'String', 'is_correct' => true],
            ['question_id' => 16, 'content' => 'Paragraph', 'is_correct' => false],
            ['question_id' => 16, 'content' => 'Div', 'is_correct' => false],

            // Q17: What is the correct syntax to print in PHP?
            ['question_id' => 17, 'content' => 'echo "Hello";', 'is_correct' => true],
            ['question_id' => 17, 'content' => 'print "Hello"', 'is_correct' => false],
            ['question_id' => 17, 'content' => 'console.log("Hello");', 'is_correct' => false],

            // Q18: What does CSS stand for?
            ['question_id' => 18, 'content' => 'Cascading Style Sheets', 'is_correct' => true],
            ['question_id' => 18, 'content' => 'Creative Style Sheets', 'is_correct' => false],
            ['question_id' => 18, 'content' => 'Computer Style Sheets', 'is_correct' => false],

            // Q19: Which symbol is used to start a comment in SQL?
            ['question_id' => 19, 'content' => '--', 'is_correct' => true],
            ['question_id' => 19, 'content' => '#', 'is_correct' => false],
            ['question_id' => 19, 'content' => '/*', 'is_correct' => false],
        ]);
    }
}
