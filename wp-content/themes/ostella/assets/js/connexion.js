// =======================================
// CONNEXION PAGE FORM FIELD VALIDATION
// =======================================

const formTestConnexion = document.getElementById('form-test-connexion');

if (formTestConnexion) {
    const iconControl8 = document.getElementById('icon-control8');
    const iconControl9 = document.getElementById('icon-control9');

    const formErrorConnexion = document.getElementById('form-error-connexion');
    const thanksConnexion = document.getElementById('thanks-connexion');

    const checkConnexion = '<i class="fas fa-check checkStyleConnexion"></i>';
    const noCheckConnexion = '<i class="fas fa-exclamation exclamationStyleConnexion"></i>';

    const borderCheckConnexion = "1px solid lightgreen";
    const borderNoCheckConnexion = "1px solid tomato";
    const formErrorColorConnexion = "tomato";

    const connexionLogin = document.getElementById('connexion_login');
    const connexionPassword = document.getElementById('connexion_password');

    const messageConnexionLogin = "Le pseudo doit contenir au moins 3 caractères";
    const messageConnexionPassword = "Le mot de passe doit contenir au moins 5 caractères";

    connexionLogin.oninput = validateConnexionLogin;
    connexionPassword.oninput = validateConnexionPassword;

    function validateConnexionLogin(event) {
        if (connexionLogin.value.length >= 3) {
            iconControl8.innerHTML = checkConnexion;
            formErrorConnexion.innerHTML = "";
        } else {
            console.log('Erreur');
            formErrorConnexion.removeAttribute('hidden');
            formErrorConnexion.innerHTML = messageConnexionLogin;
            iconControl8.innerHTML = noCheckConnexion;
            formErrorConnexion.style.color = formErrorColorConnexion;
        }
    }

    function validateConnexionPassword(event) {
        if (connexionPassword.value.length >= 5) {
            iconControl9.innerHTML = checkConnexion;
            formErrorConnexion.innerHTML = "";
        } else {
            formErrorConnexion.removeAttribute('hidden');
            formErrorConnexion.innerHTML = messageConnexionPassword;
            iconControl9.innerHTML = noCheckConnexion;
            formErrorConnexion.style.color = formErrorColorConnexion;
        }
    }
}