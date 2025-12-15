<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista Quizów') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold">Witaj w Świecie Quizów</h1>
                <p class="text-lg text-gray-600">Sprawdź swoją wiedzę w jednej z dostępnych kategorii.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($quizzes as $quiz)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col">
                        <div class="p-6 flex-grow">
                            <h3 class="text-xl font-semibold">{{ $quiz->title }}</h3>
                            <p class="mt-2 text-gray-600">{{ $quiz->description }}</p>
                        </div>
                        <div class="p-6 bg-gray-50 border-t border-gray-200">
                            <a href="{{ route('quizzes.show', $quiz->id) }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Rozpocznij quiz
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">
                        <p>Nie znaleziono żadnych quizów.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>


