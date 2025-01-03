
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(event) {
        let hasError = false;
        clearErrors();

        const nomCours = document.getElementById('nom_cours').value.trim();
        const codeCours = document.getElementById('code_cours').value.trim();
        const nombreHeures = document.getElementById('nbr').value.trim();

        const nomPattern = /^[A-Za-z0-9\s]+$/;
        const codePattern = /^[A-Za-z0-9]+$/;
        const heuresPattern = /^[0-9]{1,3}$/;

        if (!nomCours.match(nomPattern)) {
            showError('nom_cours', 'Le nom du cours doit contenir uniquement des lettres, des chiffres et des espaces.');
            hasError = true;
        }

        if (!codeCours.match(codePattern)) {
            showError('code_cours', 'Le code du cours doit contenir uniquement des lettres et des chiffres, sans espaces.');
            hasError = true;
        }

        if (!nombreHeures.match(heuresPattern)) {
            showError('nbr', 'Le nombre d\'heures doit contenir uniquement des chiffres (max 3 chiffres).');
            hasError = true;
        }

        if (hasError) {
            event.preventDefault();
        }
    });

    function showError(inputId, message) {
        const inputElement = document.getElementById(inputId);
        inputElement.classList.add('error');

        const errorMessage = document.createElement('div');
        errorMessage.className = 'error-message';
        errorMessage.innerText = message;

        inputElement.parentNode.insertBefore(errorMessage, inputElement.nextSibling);
    }

    function clearErrors() {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(function(message) {
            message.remove();
        });

        const errorInputs = document.querySelectorAll('.error');
        errorInputs.forEach(function(input) {
            input.classList.remove('error');
        });
    }
});

