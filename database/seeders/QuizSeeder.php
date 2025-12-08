<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks for truncation
        Schema::disableForeignKeyConstraints();

        // Clear tables before seeding
        Question::truncate();
        Quiz::truncate();

        // Re-enable foreign key checks
        Schema::enableForeignKeyConstraints();

        $quizzesData = [
            [
                'title' => 'Podstawy PHP',
                'description' => 'Krótki quiz z podstaw PHP.',
                'questions' => [
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Co oznacza skrót PHP?',
                        'answers' => ['Personal Home Page', 'PHP Hypertext Preprocessor', 'Private Home Page'],
                        'correct_answer' => '1',
                    ],
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Który symbol służy do oznaczania zmiennej w PHP?',
                        'answers' => ['#', '$', '@'],
                        'correct_answer' => '1',
                    ],
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Który z poniższych jest poprawnym zakończeniem instrukcji w PHP?',
                        'answers' => [',', '.', ';'],
                        'correct_answer' => '2',
                    ],
                ],
            ],
            [
                'title' => 'Laravel – podstawy',
                'description' => 'Quiz o routingu, kontrolerach i widokach w Laravelu.',
                'questions' => [
                    [
                        'type' => 'multiple_choice',
                        'question' => 'W którym pliku definiujemy trasy HTTP aplikacji webowej?',
                        'answers' => ['routes/web.php', 'config/routes.php', 'resources/views/routes.blade.php'],
                        'correct_answer' => '0',
                    ],
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Jakiej komendy użyjesz, aby stworzyć nowy kontroler?',
                        'answers' => ['php artisan make:controller QuizController', 'php artisan make:model QuizController', 'php artisan new:controller QuizController'],
                        'correct_answer' => '0',
                    ],
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Która funkcja w kontrolerze zwraca widok Blade?',
                        'answers' => ['redirect()', 'view()', 'route()'],
                        'correct_answer' => '1',
                    ],
                ],
            ],
            [
                'title' => 'Wiedza ogólna',
                'description' => 'Sprawdź swoją wiedzę z różnych dziedzin.',
                'questions' => [
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Która planeta jest największa w naszym Układzie Słonecznym?',
                        'answers' => ['Ziemia', 'Jowisz', 'Saturn'],
                        'correct_answer' => '1',
                    ],
                    [
                        'type' => 'text',
                        'question' => 'Jak nazywa się stolica Francji?',
                        'answers' => null,
                        'correct_answer' => 'Paryż',
                    ],
                ],
            ],
        ];

        foreach ($quizzesData as $quizData) {
            $quiz = Quiz::create([
                'title' => $quizData['title'],
                'description' => $quizData['description'],
            ]);

            foreach ($quizData['questions'] as $questionData) {
                $quiz->questions()->create($questionData);
            }
        }
    }
}
