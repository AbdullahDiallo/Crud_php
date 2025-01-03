document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(event) {
        // Initialiser les erreurs
        let hasError = false;
        clearErrors();

        const nom = document.getElementById('nom').value.trim();
        const prenom = document.getElementById('prenom').value.trim();
        const email = document.getElementById('email').value.trim();
        const telephone = document.getElementById('telephone').value.trim();

        const nomPrenomPattern = /^[A-Za-z\s]+$/;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const telephonePattern = /^\+?[0-9]{1,15}$/;

        if (!nom.match(nomPrenomPattern)) {
            showError('nom', 'Le nom doit contenir uniquement des lettres et des espaces.');
            hasError = true;
        }

        if (!prenom.match(nomPrenomPattern)) {
            showError('prenom', 'Le prénom doit contenir uniquement des lettres et des espaces.');
            hasError = true;
        }

        if (!email.match(emailPattern)) {
            showError('email', 'L\'email n\'est pas valide.');
            hasError = true;
        }

        if (!telephone.match(telephonePattern)) {
            showError('telephone', 'Le téléphone doit commencer par un "+" et contenir uniquement des chiffres (max 15 chiffres).');
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

