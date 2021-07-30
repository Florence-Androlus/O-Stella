// =======================================
// INSCRIPTION PAGE FORM FIELD VALIDATION
// =======================================

const formTestInscription = document.getElementById('form-test-inscription');


if (formTestInscription) {
    const iconControl1 = document.getElementById('icon-control1');
    const iconControl2 = document.getElementById('icon-control2');
    const iconControl3 = document.getElementById('icon-control3');
    const iconControl4 = document.getElementById('icon-control4');
    const iconControl5 = document.getElementById('icon-control5');

    const formErrorInscription = document.getElementById('form-error-inscription');
    const thanksInscription = document.getElementById('thanks-inscription');

    const check = '<i class="fas fa-check checkStyle"></i>';
    const noCheck = '<i class="fas fa-exclamation exclamationStyle"></i>';

    const borderCheck = "1px solid lightgreen";
    const borderNoCheck = "1px solid tomato";
    const formErrorColor = "tomato";

    const userEmail = document.getElementById('user_email');
    const userFirstname = document.getElementById('user_firstname');
    // let userFirstname = document.forms["form-test"]["user_firstname"].value;
    const userLastname = document.getElementById('user_lastname');
    const userLogin = document.getElementById('user_login');
    const userPassword = document.getElementById('user_password');

    const messageEmail = "Veuillez entrer un email au bon format";
    const messageFirstname = "Le prénom doit contenir au moins 2 caractères";
    const messageLastname = "Le nom doit contenir au moins 2 caractères";
    const messageLogin = "Le pseudo doit contenir au moins 3 caractères";
    const messagePassword = "Le mot de passe doit contenir au moins 5 caractères";

    userEmail.oninput = validateEmail;
    userFirstname.oninput = validateFirstname;
    userLastname.oninput = validateLastname;
    userLogin.oninput = validateUserLogin;
    userPassword.oninput = validateUserPassword;

    function validateEmail(event) {
        const mailFormat = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if(userEmail.value.match(mailFormat))
        {
            iconControl1.innerHTML = check;
            formErrorInscription.innerHTML = "";
        } else {
            console.log('Erreur');
            formErrorInscription.removeAttribute('hidden');
            formErrorInscription.innerHTML = messageEmail;
            iconControl1.innerHTML = noCheck;
            formErrorInscription.style.color = formErrorColor;
        }
    }

    function validateFirstname(event) {
        if (userFirstname.value.length >= 2) {
            iconControl2.innerHTML = check;
            formErrorInscription.innerHTML = "";
        } else {
            if ((userFirstname.value.length < 2) || userFirstname.value === "") {
            console.log('Erreur');
            formErrorInscription.removeAttribute('hidden');
            formErrorInscription.innerHTML = messageFirstname;
            iconControl2.innerHTML = noCheck;
            formErrorInscription.style.color = formErrorColor;
            }
        }
    }

    function validateLastname(event) {
        if (userLastname.value.length >= 2) {
            iconControl3.innerHTML = check;
            formErrorInscription.innerHTML = "";
        } else {
            if ((userLastname.value.length < 2) || userLastname.value === "") {
            console.log('Erreur');
            formErrorInscription.removeAttribute('hidden');
            formErrorInscription.innerHTML = messageLastname;
            iconControl3.innerHTML = noCheck;
            formErrorInscription.style.color = formErrorColor;
            }
        }
    }

    function validateUserLogin(event) {
        if (userLogin.value.length >= 3) {
            iconControl4.innerHTML = check;
            formErrorInscription.innerHTML = "";
        } else {
            if ((userLogin.value.length < 3) || userLogin.value === "") {
            console.log('Erreur');
            formErrorInscription.removeAttribute('hidden');
            formErrorInscription.innerHTML = messageLogin;
            iconControl4.innerHTML = noCheck;
            formErrorInscription.style.color = formErrorColor;
            }
        }
    }

    function validateUserPassword(event) {
        if (userPassword.value.length >= 5) {
            iconControl5.innerHTML = check;
            formErrorInscription.innerHTML = "";
        } else {
            if ((userPassword.value.length < 5) || userPassword.value === "") {
            console.log('Erreur');
            formErrorInscription.removeAttribute('hidden');
            formErrorInscription.innerHTML = messagePassword;
            iconControl5.innerHTML = noCheck;
            formErrorInscription.style.color = formErrorColor;
            }
        }
    }
}