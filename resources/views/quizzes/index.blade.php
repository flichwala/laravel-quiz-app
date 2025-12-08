@extends('layouts.app')

@section('title', 'Lista quizów')

@section('content')
    <div class="text-center mb-5">
        <h1 class="display-4">Witaj w Świecie Quizów</h1>
        <p class="lead text-muted">Sprawdź swoją wiedzę w jednej z dostępnych kategorii.</p>
    </div>

    <div class="row">
        @forelse ($quizzes as $quiz)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h2 class="h4 card-title">{{ $quiz['title'] }}</h2>
                        <p class="card-text text-muted_">{{ $quiz['description'] }}</p>
                        <a href="{{ route('quizzes.show', $quiz['id']) }}" class="btn btn-primary mt-auto">
                            Rozpocznij quiz
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <p class="text-center text-muted">Nie znaleziono żadnych quizów.</p>
            </div>
        @endforelse
    </div>
@endsection

