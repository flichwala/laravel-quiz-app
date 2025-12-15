<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuizController::class, 'home'])->name('home'); // Now points to QuizController@home

// Quiz list now accessible via /quizzes
Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');

Route::get('/dashboard', function () {
    return redirect()->route('quizzes.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Protected quiz routes
    Route::get('/quizzes/{quiz}', [QuizController::class, 'show'])->name('quizzes.show');
    Route::post('/quizzes/{quiz}/submit', [QuizController::class, 'submit'])->name('quizzes.submit');
    Route::get('/my-results', [QuizController::class, 'history'])->name('quizzes.history');
});

require __DIR__.'/auth.php';
