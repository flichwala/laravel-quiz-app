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
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Jaki jest najwyższy szczyt świata?',
                        'answers' => ['K2', 'Mount Everest', 'Kangchendzonga'],
                        'correct_answer' => '1',
                    ],
                    [
                        'type' => 'text',
                        'question' => 'Ile kontynentów jest na Ziemi?',
                        'answers' => null,
                        'correct_answer' => '7',
                    ],
                ],
            ],
            [
                'title' => 'JavaScript – podstawy',
                'description' => 'Sprawdź swoją wiedzę z podstaw JavaScriptu.',
                'questions' => [
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Które słowo kluczowe służy do deklarowania zmiennej, której wartość może się zmienić?',
                        'answers' => ['const', 'let', 'var'],
                        'correct_answer' => '1',
                    ],
                    [
                        'type' => 'text',
                        'question' => 'Jakiego operatora używamy do sprawdzania równości wartości i typu w JavaScript?',
                        'answers' => null,
                        'correct_answer' => '===',
                    ],
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Co oznacza skrót DOM?',
                        'answers' => ['Data Object Model', 'Document Order Model', 'Document Object Model'],
                        'correct_answer' => '2',
                    ],
                ],
            ],
            [
                'title' => 'Python – podstawy',
                'description' => 'Sprawdź swoją wiedzę z podstaw Pythona.',
                'questions' => [
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Które słowo kluczowe służy do definiowania funkcji w Pythonie?',
                        'answers' => ['func', 'def', 'function'],
                        'correct_answer' => '1',
                    ],
                    [
                        'type' => 'text',
                        'question' => 'Jakiego operatora używamy do potęgowania w Pythonie?',
                        'answers' => null,
                        'correct_answer' => '**',
                    ],
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Co to jest PEP 8?',
                        'answers' => ['Wersja Pythona', 'Zbiór wytycznych stylowych dla kodu Pythona', 'Rodzaj błędu w Pythonie'],
                        'correct_answer' => '1',
                    ],
                ],
            ],
            [
                'title' => 'C# – podstawy',
                'description' => 'Sprawdź swoją wiedzę z podstaw C#.',
                'questions' => [
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Które słowo kluczowe służy do deklarowania stałej w C#?',
                        'answers' => ['const', 'readonly', 'static'],
                        'correct_answer' => '0',
                    ],
                    [
                        'type' => 'text',
                        'question' => 'Jak nazywa się platforma .NET, która umożliwia uruchamianie aplikacji C# na różnych systemach operacyjnych?',
                        'answers' => null,
                        'correct_answer' => '.NET Core',
                    ],
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Co to jest LINQ?',
                        'answers' => ['Language Integrated Query', 'Lightweight Internet Networking Queries', 'Logical Interface Naming Quality'],
                        'correct_answer' => '0',
                    ],
                ],
            ],
            [
                'title' => 'Muzyka – ogólna wiedza',
                'description' => 'Quiz dla fanów muzyki.',
                'questions' => [
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Który instrument jest potocznie nazywany "królową instrumentów"?',
                        'answers' => ['Fortepian', 'Skrzypce', 'Organy'],
                        'correct_answer' => '0',
                    ],
                    [
                        'type' => 'text',
                        'question' => 'Który kompozytor napisał słynne "Cztery pory roku"?',
                        'answers' => null,
                        'correct_answer' => 'Vivaldi',
                    ],
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Co to jest a capella?',
                        'answers' => ['Śpiew bez akompaniamentu instrumentów', 'Technika gry na gitarze', 'Rodzaj tańca'],
                        'correct_answer' => '0',
                    ],
                ],
            ],
            [
                'title' => 'Filmy – ogólna wiedza',
                'description' => 'Quiz dla kinomanów.',
                'questions' => [
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Który film zdobył Oscara w kategorii "Najlepszy Film" w 1995 roku?',
                        'answers' => ['Forrest Gump', 'Pulp Fiction', 'Skazani na Shawshank'],
                        'correct_answer' => '0',
                    ],
                    [
                        'type' => 'text',
                        'question' => 'Jak nazywa się reżyser filmu "Incepcja"?',
                        'answers' => null,
                        'correct_answer' => 'Christopher Nolan',
                    ],
                    [
                        'type' => 'multiple_choice',
                        'question' => 'Który aktor wcielił się w rolę Jamesa Bonda w najwięcej filmach?',
                        'answers' => ['Sean Connery', 'Roger Moore', 'Daniel Craig'],
                        'correct_answer' => '1',
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