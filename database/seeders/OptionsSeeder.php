<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Questions as Question;

class OptionsSeeder extends Seeder
{
    public function run(): void
    {        
        DB::table('options')->insert([

        // ------------------------------------
            // English Quiz (questions id 1 → 5)
            // ------------------------------------

            // Q1: plural of child
            ['question_id' => 1, 'content' => 'Childs',   'is_correct' => 0],
            ['question_id' => 1, 'content' => 'Children','is_correct' => 1],
            ['question_id' => 1, 'content' => 'Childes', 'is_correct' => 0],

            // Q2: correct sentence
            ['question_id' => 2, 'content' => 'He go to school.',      'is_correct' => 0],
            ['question_id' => 2, 'content' => 'He goes to school.',    'is_correct' => 1],
            ['question_id' => 2, 'content' => 'He going to school.',   'is_correct' => 0],

            // Q3: synonym of happy
            ['question_id' => 3, 'content' => 'Sad',      'is_correct' => 0],
            ['question_id' => 3, 'content' => 'Joyful',   'is_correct' => 1],
            ['question_id' => 3, 'content' => 'Angry',    'is_correct' => 0],

            // Q4: adjective
            ['question_id' => 4, 'content' => 'Go',       'is_correct' => 0],
            ['question_id' => 4, 'content' => 'Happy',    'is_correct' => 1],
            ['question_id' => 4, 'content' => 'Run',      'is_correct' => 0],

            // Q5: Fill in the blank
            ['question_id' => 5, 'content' => 'go',       'is_correct' => 1],
            ['question_id' => 5, 'content' => 'going',    'is_correct' => 0],
            ['question_id' => 5, 'content' => 'gone',     'is_correct' => 0],


            // ------------------------------------
            // French Quiz (questions id 6 → 10)
            // ------------------------------------

            // Q6: apple in French
            ['question_id' => 6, 'content' => 'Pomme', 'is_correct' => 1],
            ['question_id' => 6, 'content' => 'Poire', 'is_correct' => 0],
            ['question_id' => 6, 'content' => 'Orange','is_correct' => 0],

            // Q7: plural of cheval
            ['question_id' => 7, 'content' => 'Cheval',  'is_correct' => 0],
            ['question_id' => 7, 'content' => 'Chevaux', 'is_correct' => 1],
            ['question_id' => 7, 'content' => 'Chevale', 'is_correct' => 0],

            // Q8: correct phrase
            ['question_id' => 8, 'content' => 'Je mange une pomme.',  'is_correct' => 1],
            ['question_id' => 8, 'content' => 'Je mangee une pomme.', 'is_correct' => 0],
            ['question_id' => 8, 'content' => 'Je manges une pomme.', 'is_correct' => 0],

            // Q9: infinitive of manges
            ['question_id' => 9, 'content' => 'Manger', 'is_correct' => 1],
            ['question_id' => 9, 'content' => 'Manges', 'is_correct' => 0],
            ['question_id' => 9, 'content' => 'Mang',   'is_correct' => 0],

            // Q10: thank you in French
            ['question_id' => 10, 'content' => 'Merci',   'is_correct' => 1],
            ['question_id' => 10, 'content' => 'Bonjour', 'is_correct' => 0],
            ['question_id' => 10, 'content' => 'Salut',   'is_correct' => 0],


            // ------------------------------------
            // Coding Quiz (questions id 11 → 15)
            // ------------------------------------

            // Q11: HTML
            ['question_id' => 11, 'content' => 'Hyperlinks Text Marking Language',   'is_correct' => 0],
            ['question_id' => 11, 'content' => 'HyperText Markup Language',         'is_correct' => 1],
            ['question_id' => 11, 'content' => 'Home Tool Markup Language',         'is_correct' => 0],

            // Q12: JS data type
            ['question_id' => 12, 'content' => 'String',    'is_correct' => 1],
            ['question_id' => 12, 'content' => 'Paragraph', 'is_correct' => 0],
            ['question_id' => 12, 'content' => 'Div',       'is_correct' => 0],

            // Q13: print PHP
            ['question_id' => 13, 'content' => 'echo "Hello";',     'is_correct' => 1],
            ['question_id' => 13, 'content' => 'print "Hello"',     'is_correct' => 0],
            ['question_id' => 13, 'content' => 'console.log("Hello");','is_correct' => 0],

            // Q14: CSS
            ['question_id' => 14, 'content' => 'Cascading Style Sheets', 'is_correct' => 1],
            ['question_id' => 14, 'content' => 'Creative Style Sheets',  'is_correct' => 0],
            ['question_id' => 14, 'content' => 'Computer Style Sheets',  'is_correct' => 0],

            // Q15: SQL comment
            ['question_id' => 15, 'content' => '--',  'is_correct' => 1],
            ['question_id' => 15, 'content' => '#',   'is_correct' => 0],
            ['question_id' => 15, 'content' => '/*',  'is_correct' => 0],

        ]);
    }
}
