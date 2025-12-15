<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Strona główna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <h1 class="mb-3 text-2xl font-bold">Witaj w aplikacji Quizy</h1>
                    <p class="lead mb-4">
                        Wybierz jeden z dostępnych quizów i sprawdź swoją wiedzę z programowania.
                    </p>
                    <a href="{{ route('quizzes.index') }}" class="inline-block px-6 py-3 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                        Przejdź do listy quizów
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>