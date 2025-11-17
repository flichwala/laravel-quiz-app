<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    private array $quizzes = [
        1 => [
            'id' => 1,
            'title' => 'Podstawy PHP',
            'description' => 'Krótki quiz z podstaw PHP.',
            'questions' => [
                [
                    'question' => 'Co oznacza skrót PHP?',
                    'answers' => [
                        'Personal Home Page',
                        'PHP Hypertext Preprocessor',
                        'Private Home Page',
                    ],
                    'correct' => 1,
                ],
                [
                    'question' => 'Który symbol służy do oznaczania zmiennej w PHP?',
                    'answers' => [
                        '#',
                        '$',
                        '@',
                    ],
                    'correct' => 1,
                ],
                [
                    'question' => 'Który z poniższych jest poprawnym zakończeniem instrukcji w PHP?',
                    'answers' => [
                        ',',
                        '.',
                        ';',
                    ],
                    'correct' => 2,
                ],
            ],
        ],
        2 => [
            'id' => 2,
            'title' => 'Laravel – podstawy',
            'description' => 'Quiz o routingu, kontrolerach i widokach w Laravelu.',
            'questions' => [
                [
                    'question' => 'W którym pliku definiujemy trasy HTTP aplikacji webowej?',
                    'answers' => [
                        'routes/web.php',
                        'config/routes.php',
                        'resources/views/routes.blade.php',
                    ],
                    'correct' => 0,
                ],
                [
                    'question' => 'Jakiej komendy użyjesz, aby stworzyć nowy kontroler?',
                    'answers' => [
                        'php artisan make:controller QuizController',
                        'php artisan make:model QuizController',
                        'php artisan new:controller QuizController',
                    ],
                    'correct' => 0,
                ],
                [
                    'question' => 'Która funkcja w kontrolerze zwraca widok Blade?',
                    'answers' => [
                        'redirect()',
                        'view()',
                        'route()',
                    ],
                    'correct' => 1,
                ],
            ],
        ],
    ];

    public function home()
    {
        return view('home');
    }

    public function index()
    {
        $quizzes = $this->quizzes;

        return view('quizzes.index', ['quizzes' => $quizzes]);
    }

    public function show(int $quiz)
    {
        $quizData = $this->quizzes[$quiz] ?? null;

        abort_unless($quizData, 404);

        return view('quizzes.show', ['quiz' => $quizData]);
    }
}
