<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function index()
    {
        $quizzes = Quiz::all();

        return view('quizzes.index', ['quizzes' => $quizzes]);
    }

    public function show(Quiz $quiz)
    {
        $quiz->load('questions');

        return view('quizzes.show', ['quiz' => $quiz]);
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $quiz->load('questions');
        $submittedAnswers = $request->input('answers', []);
        $results = [];
        $correctCount = 0;

        foreach ($quiz->questions as $question) {
            $questionId = $question->id;
            $userAnswer = $submittedAnswers[$questionId] ?? null;
            $isCorrect = false;

            if ($question->type === 'multiple_choice') {
                // For multiple choice, correct_answer is the index
                $correctIndex = (string) $question->correct_answer;
                $isCorrect = ((string) $userAnswer === $correctIndex);
            } elseif ($question->type === 'text') {
                // For text, correct_answer is the string
                $isCorrect = (
                    mb_strtolower(trim((string) $userAnswer)) ===
                    mb_strtolower(trim((string) $question->correct_answer))
                );
            }

            if ($isCorrect) {
                $correctCount++;
            }

            $results[$questionId] = [
                'is_correct' => $isCorrect,
                'correct_answer' => $question->correct_answer,
                'type' => $question->type,
                'user_answer' => $userAnswer,
            ];
        }

        return response()->json([
            'score' => $correctCount,
            'total' => $quiz->questions->count(),
            'results' => $results,
        ]);
    }
}

