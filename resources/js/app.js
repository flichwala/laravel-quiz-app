import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    const quizForm = document.getElementById('quiz-form');
    if (!quizForm) {
        return;
    }

    const checkAnswersBtn = document.getElementById('check-answers-btn');
    const quizResultContainer = document.getElementById('quiz-result');
    const quizId = document.querySelector('[data-quiz-id]').dataset.quizId;
    const questions = quizForm.querySelectorAll('[data-question-index]');
    const validationMessage = document.getElementById('validation-message');

    checkAnswersBtn.addEventListener('click', function () {
        const formData = new FormData(quizForm);
        const answers = {};
        let allAnswered = true;

        questions.forEach(question => {
            const questionId = question.id.split('_')[1];
            const radio = question.querySelector(`input[name="question_${questionId}"]:checked`);
            const textInput = question.querySelector(`input[type="text"][name="question_${questionId}"]`);

            if (radio) {
                answers[questionId] = radio.value;
            } else if (textInput) {
                answers[questionId] = textInput.value;
            }

            if (!answers[questionId]) {
                allAnswered = false;
            }
        });

        if (!allAnswered) {
            validationMessage.classList.remove('hidden');
            return;
        } else {
            validationMessage.classList.add('hidden');
        }

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(`/quizzes/${quizId}/submit`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({ answers: answers }),
        })
        .then(response => response.json())
        .then(data => {
            quizResultContainer.textContent = `Twój wynik: ${data.score} / ${data.total}`;

            for (const questionId in data.results) {
                const result = data.results[questionId];
                const questionElement = document.getElementById(`question_${questionId}`);

                if (result.is_correct) {
                    questionElement.classList.add('bg-green-100', 'border', 'border-green-400');
                } else {
                    questionElement.classList.add('bg-red-100', 'border', 'border-red-400');
                    const correctAnswerElement = document.createElement('div');
                    correctAnswerElement.classList.add('p-4', 'mt-4', 'text-sm', 'text-green-700', 'bg-green-50', 'rounded-lg');
                    
                    if(result.type === 'multiple_choice' && questionElement.querySelectorAll('label')[result.correct_answer]){
                         correctAnswerElement.textContent = `Poprawna odpowiedź: ${questionElement.querySelectorAll('label')[result.correct_answer].textContent.trim()}`;
                    } else {
                         correctAnswerElement.textContent = `Poprawna odpowiedź: ${result.correct_answer}`;
                    }
                   
                    questionElement.querySelector('.p-6').appendChild(correctAnswerElement);
                }
            }
            
            checkAnswersBtn.disabled = true;
            checkAnswersBtn.classList.add('opacity-50', 'cursor-not-allowed');
        })
        .catch(error => {
            console.error('Error:', error);
            quizResultContainer.textContent = 'Wystąpił błąd podczas sprawdzania odpowiedzi.';
        });
    });
});
