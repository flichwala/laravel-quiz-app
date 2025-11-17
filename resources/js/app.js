import './bootstrap';
import.meta.glob(['../images/**']);

document.addEventListener('DOMContentLoaded', () => {
    const checkButton = document.querySelector('[data-check-answers]');
    if (!checkButton) {
        return;
    }

    checkButton.addEventListener('click', () => {
        const questionCards = document.querySelectorAll('[data-question-index]');
        let correctCount = 0;

        questionCards.forEach(card => {
            const answers = card.querySelectorAll('input[type="radio"]');
            const selected = card.querySelector('input[type="radio"]:checked');

            answers.forEach(input => {
                const label = card.querySelector('label[for="' + input.id + '"]');
                if (label) {
                    label.classList.remove('text-success', 'text-danger', 'fw-bold');
                }
            });

            if (!selected) {
                return;
            }

            const selectedLabel = card.querySelector('label[for="' + selected.id + '"]');
            if (!selectedLabel) {
                return;
            }

            const isCorrect = selected.dataset.correct === '1';

            if (isCorrect) {
                selectedLabel.classList.add('text-success', 'fw-bold');
                correctCount++;
            } else {
                selectedLabel.classList.add('text-danger', 'fw-bold');
                const correctInput = card.querySelector('input[data-correct="1"]');
                if (correctInput) {
                    const correctLabel = card.querySelector('label[for="' + correctInput.id + '"]');
                    if (correctLabel) {
                        correctLabel.classList.add('text-success', 'fw-bold');
                    }
                }
            }
        });

        const resultBox = document.querySelector('#quiz-result');
        if (resultBox) {
            const total = document.querySelectorAll('[data-question-index]').length;
            resultBox.textContent = 'Twój wynik: ' + correctCount + ' / ' + total;
        }
    });
});
