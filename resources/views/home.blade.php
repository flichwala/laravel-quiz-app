@extends('layouts.app')

@section('title', 'Strona główna')

@section('content')
    <div class="text-center">
        <h1 class="mb-3">Witaj w aplikacji Quizy</h1>
        <p class="lead mb-4">
            Wybierz jeden z dostępnych quizów i sprawdź swoją wiedzę z programowania.
        </p>
        <a href="{{ route('quizzes.index') }}" class="btn btn-primary btn-lg">
            Przejdź do listy quizów
        </a>
    </div>
@endsection