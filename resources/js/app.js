import './bootstrap';
import.meta.glob(['../images/**']);

document.addEventListener('DOMContentLoaded', () => {
    const quizForm = document.getElementById('quiz-form');
    if (!quizForm) return;

    const checkButton = document.getElementById('check-answers-btn');
    const resultBox = document.getElementById('quiz-result');
    const questions = quizForm.querySelectorAll('[data-question-index]');

    checkButton.addEventListener('click', () => {
        if (!confirm('Czy na pewno chcesz sprawdzić swoje odpowiedzi?')) {
            return;
        }

        let correctCount = 0;

        questions.forEach(card => {
            const selectedAnswer = card.querySelector('input[type="radio"]:checked');
            const answers = card.querySelectorAll('input[type="radio"]');

            answers.forEach(input => {
                const label = card.querySelector(`label[for="${input.id}"]`);
                label.classList.remove('text-success', 'text-danger', 'fw-bold');
                input.disabled = true; // Disable all inputs after checking
            });

            if (selectedAnswer) {
                const isCorrect = selectedAnswer.dataset.correct === '1';
                const selectedLabel = card.querySelector(`label[for="${selectedAnswer.id}"]`);

                if (isCorrect) {
                    correctCount++;
                    selectedLabel.classList.add('text-success', 'fw-bold');
                } else {
                    selectedLabel.classList.add('text-danger', 'fw-bold');
                    const correctInput = card.querySelector('input[data-correct="1"]');
                    const correctLabel = card.querySelector(`label[for="${correctInput.id}"]`);
                    correctLabel.classList.add('text-success', 'fw-bold');
                }
            }
        });

        resultBox.innerHTML = `Twój wynik: <span class="fw-bold text-primary">${correctCount} / ${questions.length}</span>`;
        resultBox.style.opacity = '0';
        setTimeout(() => {
            resultBox.style.transition = 'opacity 0.5s ease-in-out';
            resultBox.style.opacity = '1';
        }, 100);

        checkButton.disabled = true;
        checkButton.textContent = 'Odpowiedzi sprawdzone';
    });
});

