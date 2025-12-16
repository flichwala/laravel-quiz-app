<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.questions.update', $question) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="question" class="block text-gray-700 text-sm font-bold mb-2">Question:</label>
                            <textarea name="question" id="question" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('question', $question->question) }}</textarea>
                            @error('question')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Question Type:</label>
                            <select name="type" id="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="multiple_choice" @if(old('type', $question->type) == 'multiple_choice') selected @endif>Multiple Choice</option>
                                <option value="text" @if(old('type', $question->type) == 'text') selected @endif>Text</option>
                            </select>
                            @error('type')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="answers" class="block text-gray-700 text-sm font-bold mb-2">Answers (comma-separated for multiple choice):</label>
                            <input type="text" name="answers" id="answers" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('answers', is_array($question->answers) ? implode(',', $question->answers) : $question->answers) }}">
                            @error('answers')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="correct_answer" class="block text-gray-700 text-sm font-bold mb-2">Correct Answer:</label>
                            <input type="text" name="correct_answer" id="correct_answer" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('correct_answer', $question->correct_answer) }}">
                            @error('correct_answer')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update Question
                            </button>
                            <a href="{{ route('admin.quizzes.show', $question->quiz) }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
