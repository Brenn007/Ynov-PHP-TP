//fonction pour afficher une alerte de bienvenue
function showWelcomeMessage() {
    alert("Bienvenue sur mon site CV/Portfolio!");
}

//fonction pour valider le formulaire de contact
function validateContactForm() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    if (name === "" || email === "" || message === "") {
        alert("Tous les champs doivent être remplis.");
        return false;
    }
    return true;
}

//fonction pour afficher une alerte de confirmation avant de supprimer un projet
function confirmDeleteProject() {
    return confirm("Êtes-vous sûr de vouloir supprimer ce projet?");
}

//fonction pour afficher une alerte de confirmation avant de supprimer un utilisateur
function confirmDeleteUser() {
    return confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur?");
}

//ajouter des ecouteurs d'evenements
document.addEventListener('DOMContentLoaded', function() {
    //afficher le message de bienvenue
    showWelcomeMessage();

    //valider le formulaire de contact avant l'envoi
    const contactForm = document.querySelector('form[action="send_mail.php"]');
    if (contactForm) {
        contactForm.addEventListener('submit', function(event) {
            if (!validateContactForm()) {
                event.preventDefault();
            }
        });
    }

    //ajouter des confirmations de suppression pour les projets
    const deleteProjectButtons = document.querySelectorAll('a.btn-danger[href*="delete_project.php"]');
    deleteProjectButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            if (!confirmDeleteProject()) {
                event.preventDefault();
            }
        });
    });

    //ajouter des confirmations de suppression pour les utilisateurs
    const deleteUserButtons = document.querySelectorAll('a.btn-danger[href*="delete_user.php"]');
    deleteUserButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            if (!confirmDeleteUser()) {
                event.preventDefault();
            }
        });
    });
});
