<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Quiz $quiz)
    {
        return view('admin.questions.create', compact('quiz'));
    }

    public function store(Request $request, Quiz $quiz)
    {
        if ($request->has('answers') && is_string($request->answers)) {
            $request->merge([
                'answers' => array_map('trim', explode(',', $request->answers)),
            ]);
        }

        $validatedData = $request->validate([
            'question' => 'required|string',
            'type' => 'required|in:multiple_choice,text',
            'answers' => 'nullable|array',
            'answers.*' => 'nullable|string',
            'correct_answer' => 'nullable|string',
        ]);

        $quiz->questions()->create($validatedData);

        return redirect()->route('admin.quizzes.show', $quiz)->with('success', 'Question added successfully.');
    }

    public function edit(Question $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        if ($request->has('answers') && is_string($request->answers)) {
            $request->merge([
                'answers' => array_map('trim', explode(',', $request->answers)),
            ]);
        }

        $request->validate([
            'question' => 'required|string',
            'type' => 'required|in:multiple_choice,text',
            'answers' => 'nullable|array',
            'answers.*' => 'nullable|string',
            'correct_answer' => 'nullable|string',
        ]);

        $question->update($request->all());

        return redirect()->route('admin.quizzes.show', $question->quiz)->with('success', 'Question updated successfully.');
    }

    public function destroy(Question $question)
    {
        $quiz = $question->quiz;
        $question->delete();

        return redirect()->route('admin.quizzes.show', $quiz)->with('success', 'Question deleted successfully.');
    }
}
