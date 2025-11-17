@extends('layouts.app')

@section('title', $quiz['title'])

@section('content')
    <h1 class="mb-2">{{ $quiz['title'] }}</h1>
    <p class="text-muted mb-4">{{ $quiz['description'] }}</p>

    <form>
        @foreach ($quiz['questions'] as $index => $question)
            <div class="card mb-3" data-question-index="{{ $index }}">
                <div class="card-body">
                    <h2 class="h5 mb-3">
                        Pytanie {{ $index + 1 }}: {{ $question['question'] }}
                    </h2>

                    @foreach ($question['answers'] as $answerIndex => $answer)
                        <div class="form-check mb-1">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="question_{{ $index }}"
                                id="q{{ $index }}_a{{ $answerIndex }}"
                                data-correct="{{ $answerIndex === $question['correct'] ? '1' : '0' }}"
                            >
                            <label class="form-check-label" for="q{{ $index }}_a{{ $answerIndex }}">
                                {{ $answer }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <button type="button" class="btn btn-success" data-check-answers>
            Sprawdź odpowiedzi
        </button>

        <div id="quiz-result" class="mt-3 fw-semibold"></div>
    </form>

    <a href="{{ route('quizzes.index') }}" class="btn btn-link mt-3">
        ← Powrót do listy quizów
    </a>
@endsection
