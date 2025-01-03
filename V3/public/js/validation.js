
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(event) {
      
        let hasError = false;
        clearErrors();

        const nom = document.getElementById('equipment-nom').value.trim();
        const etat = document.getElementById('equipment-etat').value.trim();
        const disponibilite = document.getElementById('equipment-disponibilite').value;

        const nomPattern = /^[A-Za-z\s]+$/;
        const etatPattern = /^[A-Za-z\s]+$/;

        if (!nom.match(nomPattern)) {
            showError('equipment-nom', 'Le nom doit contenir uniquement des lettres et des espaces.');
            hasError = true;
        }

        if (!etat.match(etatPattern)) {
            showError('equipment-etat', 'L\'état doit contenir uniquement des lettres et des espaces.');
            hasError = true;
        }

        if (!disponibilite) {
            showError('equipment-disponibilite', 'Veuillez sélectionner une disponibilité.');
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

