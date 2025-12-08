import './bootstrap';
import.meta.glob(['../images/**']);

document.addEventListener('DOMContentLoaded', () => {
    const quizForm = document.getElementById('quiz-form');
    if (!quizForm) return;

    const checkButton = document.getElementById('check-answers-btn');
    const resultBox = document.getElementById('quiz-result');
    const questionsElements = quizForm.querySelectorAll('[data-question-index]');
    const quizId = quizForm.closest('main').querySelector('h1.display-5').dataset.quizId;
    const validationMessage = document.getElementById('validation-message');

    checkButton.addEventListener('click', async () => {
        // Clear previous validation message
        validationMessage.classList.add('d-none');

        // Client-side validation: Check if all questions are answered
        let allAnswered = true;
        questionsElements.forEach(card => {
            const questionType = card.dataset.questionType;
            let answered = false;

            if (questionType === 'multiple_choice') {
                const selectedRadio = card.querySelector('input[type="radio"]:checked');
                if (selectedRadio) {
                    answered = true;
                }
            } else if (questionType === 'text') {
                const textInput = card.querySelector('input[type="text"]');
                if (textInput && textInput.value.trim() !== '') {
                    answered = true;
                }
            }

            if (!answered) {
                allAnswered = false;
                // Optionally highlight unanswered question, e.g., add a class
                card.classList.add('border-danger'); // Add a red border to unanswered question
            } else {
                card.classList.remove('border-danger');
            }
        });

        if (!allAnswered) {
            validationMessage.classList.remove('d-none');
            // Scroll to the top of the form or first unanswered question
            quizForm.scrollIntoView({ behavior: 'smooth' });
            return; // Prevent submission
        }

        // Confirmation before sending to server
        if (!confirm('Czy na pewno chcesz sprawdzić swoje odpowiedzi?')) {
            return;
        }

        const answers = {};
        questionsElements.forEach(card => {
            const questionId = card.id.replace('question_', '');
            const questionType = card.dataset.questionType;

            if (questionType === 'multiple_choice') {
                const selectedRadio = card.querySelector('input[type="radio"]:checked');
                if (selectedRadio) {
                    answers[questionId] = selectedRadio.value;
                }
            } else if (questionType === 'text') {
                const textInput = card.querySelector('input[type="text"]');
                if (textInput) {
                    answers[questionId] = textInput.value;
                }
            }
        });

        checkButton.disabled = true;
        checkButton.textContent = 'Sprawdzam...';

        try {
            const response = await fetch(`/quizzes/${quizId}/submit`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ answers })
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();
            displayResults(data, questionsElements);

        } catch (error) {
            console.error('Błąd podczas sprawdzania odpowiedzi:', error);
            resultBox.innerHTML = '<span class="text-danger">Wystąpił błąd. Spróbuj ponownie.</span>';
        } finally {
            checkButton.textContent = 'Odpowiedzi sprawdzone';
            // Inputs are disabled in displayResults
        }
    });

    function displayResults(data, questionsElements) {
        resultBox.innerHTML = `Twój wynik: <span class="fw-bold text-primary">${data.score} / ${data.total}</span>`;
        resultBox.style.opacity = '0';
        setTimeout(() => {
            resultBox.style.transition = 'opacity 0.5s ease-in-out';
            resultBox.style.opacity = '1';
        }, 100);

        questionsElements.forEach(card => {
            const questionId = card.id.replace('question_', '');
            const result = data.results[questionId];
            const questionType = card.dataset.questionType;

            if (result) {
                // Disable all inputs for this question
                card.querySelectorAll('input, select, textarea').forEach(input => {
                    input.disabled = true;
                });

                if (questionType === 'multiple_choice') {
                    const radios = card.querySelectorAll('input[type="radio"]');
                    radios.forEach(radio => {
                        const label = card.querySelector(`label[for="${radio.id}"]`);
                        if (label) {
                            label.classList.remove('text-success', 'text-danger', 'fw-bold');
                            // Mark correct answer
                            if (radio.value == result.correct_answer) {
                                label.classList.add('text-success', 'fw-bold');
                            }
                            // Mark user's incorrect answer
                            if (radio.value == result.user_answer && !result.is_correct) {
                                label.classList.add('text-danger', 'fw-bold');
                            }
                        }
                    });
                } else if (questionType === 'text') {
                    const textInput = card.querySelector('input[type="text"]');
                    if (textInput) {
                        textInput.classList.remove('is-valid', 'is-invalid');
                        if (result.is_correct) {
                            textInput.classList.add('is-valid');
                        } else {
                            textInput.classList.add('is-invalid');
                            // Optionally display correct answer
                            const feedback = document.createElement('div');
                            feedback.classList.add('invalid-feedback', 'd-block');
                            feedback.textContent = `Poprawna odpowiedź: "${result.correct_answer}"`;
                            textInput.parentNode.insertBefore(feedback, textInput.nextSibling);
                        }
                    }
                }
            }
        });
    }
});
