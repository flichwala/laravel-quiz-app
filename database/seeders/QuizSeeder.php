<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('quizzes')->insert([
            [
                'id' => 1,
                'title' => 'Podstawy PHP',
                'description' => 'Krótki quiz z podstaw PHP.'
            ],
        ]);

        DB::table('questions')->insert([
            [
                'quiz_id' => 1,
                'question' => 'Co oznacza skrót PHP?',
                'answers' => json_encode([
                    'Personal Home Page',
                    'PHP Hypertext Preprocessor',
                    'Private Home Page'
                ]),
                'correct_answer' => 1
            ],
            [
                'quiz_id' => 1,
                'question' => 'Który symbol służy do oznaczania zmiennej w PHP?',
                'answers' => json_encode(['#', '$', '@']),
                'correct_answer' => 1
            ],
            [
                'quiz_id' => 1,
                'question' => 'Który z poniższych jest poprawnym zakończeniem instrukcji w PHP?',
                'answers' => json_encode([',', '.', ';']),
                'correct_answer' => 2
            ],
        ]);
    }
}
