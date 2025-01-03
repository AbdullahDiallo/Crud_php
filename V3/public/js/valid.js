
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(event) {
        // Initialiser les erreurs
        let hasError = false;
        clearErrors();

        const type = document.getElementById('animal-type').value.trim();
        const age = document.getElementById('animal-age').value.trim();
        const sante = document.getElementById('animal-sante').value.trim();
        const id_equipement = document.getElementById('animal-id_equipement').value;

        const typePattern = /^[A-Za-z0-9\s]+$/;
        const agePattern = /^[0-9]+$/;
        const santePattern = /^[A-Za-z\s]+$/;

        if (!type.match(typePattern)) {
            showError('animal-type', 'Le type doit contenir uniquement des lettres, des chiffres et des espaces.');
            hasError = true;
        }

        if (!age.match(agePattern)) {
            showError('animal-age', 'L\'âge doit contenir uniquement des chiffres.');
            hasError = true;
        }

        if (!sante.match(santePattern)) {
            showError('animal-sante', 'La santé doit contenir uniquement des lettres et des espaces.');
            hasError = true;
        }

        if (!id_equipement) {
            showError('animal-id_equipement', 'Veuillez sélectionner un équipement.');
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

