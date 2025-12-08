@extends('layouts.app')

@section('title', $quiz['title'])

@section('content')
    <div class="text-center">
        <h1 class="display-5" data-quiz-id="{{ $quiz->id }}">{{ $quiz->title }}</h1>
        <p class="lead text-muted mb-5">{{ $quiz->description }}</p>
    </div>

    <form id="quiz-form">
        @foreach ($quiz->questions as $index => $question)
            <div class="card mb-4" id="question_{{ $question->id }}" data-question-index="{{ $index }}" data-question-type="{{ $question->type }}">
                <div class="card-header fw-bold">
                    Pytanie {{ $index + 1 }}
                </div>
                <div class="card-body">
                    <p class="card-title h5 mb-3">{{ $question->question }}</p>

                    @if ($question->type === 'multiple_choice')
                        @foreach ($question->answers as $answerIndex => $answer)
                            <div class="form-check mb-2">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="question_{{ $question->id }}"
                                    id="q{{ $question->id }}_a{{ $answerIndex }}"
                                    value="{{ $answerIndex }}"
                                >
                                <label class="form-check-label" for="q{{ $question->id }}_a{{ $answerIndex }}">
                                    {{ $answer }}
                                </label>
                            </div>
                        @endforeach
                    @elseif ($question->type === 'text')
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                name="question_{{ $question->id }}"
                                id="q{{ $question->id }}"
                                placeholder="Wpisz swoją odpowiedź"
                            >
                        </div>
                    @endif
                </div>
            </div>
        @endforeach

        <div id="validation-message" class="alert alert-danger d-none" role="alert">
            Proszę odpowiedzieć na wszystkie pytania przed sprawdzeniem quizu.
        </div>
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

