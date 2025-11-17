@extends('layouts.app')

@section('title', 'Lista quizów')

@section('content')
    <h1 class="mb-4">Lista quizów</h1>

    <div class="row">
        @foreach ($quizzes as $quiz)
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="h5">{{ $quiz['title'] }}</h2>
                        <p class="text-muted">{{ $quiz['description'] }}</p>
                        <a href="{{ route('quizzes.show', $quiz['id']) }}" class="btn btn-outline-primary">
                            Rozpocznij quiz
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
