<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" data-quiz-id="{{ $quiz->id }}">
            {{ $quiz->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <p class="text-lg text-gray-600">{{ $quiz->description }}</p>
            </div>

            <form id="quiz-form" class="space-y-6">
                @foreach ($quiz->questions as $index => $question)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" id="question_{{ $question->id }}" data-question-index="{{ $index }}" data-question-type="{{ $question->type }}">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <h3 class="font-semibold text-lg">Pytanie {{ $index + 1 }}</h3>
                        </div>
                        <div class="p-6">
                            <p class="text-xl mb-4">{{ $question->question }}</p>

                            <div class="space-y-3">
                                @if ($question->type === 'multiple_choice')
                                    @foreach ($question->answers as $answerIndex => $answer)
                                        <div class="flex items-center">
                                            <input
                                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                                type="radio"
                                                name="question_{{ $question->id }}"
                                                id="q{{ $question->id }}_a{{ $answerIndex }}"
                                                value="{{ $answerIndex }}"
                                            >
                                            <label class="ml-3 block text-sm font-medium text-gray-700" for="q{{ $question->id }}_a{{ $answerIndex }}">
                                                {{ $answer }}
                                            </label>
                                        </div>
                                    @endforeach
                                @elseif ($question->type === 'text')
                                    <div>
                                        <input
                                            type="text"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            name="question_{{ $question->id }}"
                                            id="q{{ $question->id }}"
                                            placeholder="Wpisz swoją odpowiedź"
                                        >
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

                <div id="validation-message" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    Proszę odpowiedzieć na wszystkie pytania przed sprawdzeniem quizu.
                </div>

                <div class="text-center mt-6">
                    <button type="button" id="check-answers-btn" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Sprawdź odpowiedzi
                    </button>
                </div>

                <div id="quiz-result" class="mt-6 text-center text-2xl font-semibold"></div>
            </form>

            <div class="text-center mt-8">
                <a href="{{ route('quizzes.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
                    ← Powrót do listy quizów
                </a>
            </div>
        </div>
    </div>
</x-app-layout>


