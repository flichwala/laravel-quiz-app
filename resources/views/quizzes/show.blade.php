@extends('layouts.app')

@section('title', $quiz['title'])

@section('content')
    <div class="text-center">
        <h1 class="display-5">{{ $quiz['title'] }}</h1>
        <p class="lead text-muted mb-5">{{ $quiz['description'] }}</p>
    </div>

    <form id="quiz-form">
        @foreach ($quiz['questions'] as $index => $question)
            <div class="card mb-4" data-question-index="{{ $index }}">
                <div class="card-header fw-bold">
                    Pytanie {{ $index + 1 }}
                </div>
                <div class="card-body">
                    <p class="card-title h5 mb-3">{{ $question['question'] }}</p>

                    @foreach ($question['answers'] as $answerIndex => $answer)
                        <div class="form-check mb-2">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="question_{{ $index }}"
                                id="q{{ $index }}_a{{ $answerIndex }}"
                                value="{{ $answerIndex }}"
                                data-correct="{{ $answerIndex === $question['correct_answer'] ? '1' : '0' }}"
                            >
                            <label class="form-check-label" for="q{{ $index }}_a{{ $answerIndex }}">
                                {{ $answer }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="text-center mt-4">
            <button type="button" id="check-answers-btn" class="btn btn-primary btn-lg">
                Sprawdź odpowiedzi
            </button>
        </div>

        <div id="quiz-result" class="mt-4 text-center fs-4 fw-semibold"></div>
    </form>

    <div class="text-center mt-4">
        <a href="{{ route('quizzes.index') }}" class="btn btn-link text-muted">
            ← Powrót do listy quizów
        </a>
    </div>
@endsection

