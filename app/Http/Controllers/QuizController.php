<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $validated = $request->validate([
            'answers' => ['required', 'array'],
            'answers.*' => ['required', 'string'],
        ]);

        $quiz->load('questions');
        $submittedAnswers = $validated['answers'];
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

        // Save the result to the database
        QuizResult::create([
            'user_id' => Auth::id(),
            'quiz_id' => $quiz->id,
            'score' => $correctCount,
            'total' => $quiz->questions->count(),
        ]);

        return response()->json([
            'score' => $correctCount,
            'total' => $quiz->questions->count(),
            'results' => $results,
        ]);
    }

    public function history()
    {
        $results = QuizResult::where('user_id', Auth::id())
            ->with('quiz')
            ->latest()
            ->paginate(10);

        return view('quizzes.history', ['results' => $results]);
    }
}

