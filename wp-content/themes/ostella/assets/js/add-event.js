// =======================================
// ADD EVENT PAGE FORM FIELD VALIDATION
// =======================================

const formTestAddEvent = document.getElementById('form-test-add-event');

if (formTestAddEvent) {
    console.log("Je suis dans la condition");

    const iconControl6 = document.getElementById('icon-control6');
    const iconControl7 = document.getElementById('icon-control7');
    const iconControl10 = document.getElementById('icon-control10');
    const iconControl11 = document.getElementById('icon-control11');

    const formErrorAddEvent1 = document.getElementById('form-error-add-event1');
    const formErrorAddEvent2 = document.getElementById('form-error-add-event2');
    const formErrorAddEvent3 = document.getElementById('form-error-add-event3');

    const thanksEvent = document.getElementById('thanks-event');

    const checkEvent = '<i class="fas fa-check checkStyleEvent"></i>';
    const noCheckEvent = '<i class="fas fa-exclamation exclamationStyleEvent"></i>';

    const borderCheckEvent = "1px solid lightgreen";
    const borderNoCheckEvent = "1px solid tomato";
    const formErrorColorEvent = "tomato";
    const formErrorColorEventOk = "lightgreen";

    const eventTitle = document.getElementById('event-title');
    const eventDate = document.getElementById('event-date');
    const eventTextareaSingle = document.getElementById('textarea-single');
    const eventSelect = document.getElementById('event-select');

    const messageTitle = "Le titre doit contenir au moins 3 caractères";
    const messageDate = "Veuillez renseigner une date";
    const messageTextarea = "La description doit contenir au moins 50 caractères ";
    const messageTextareaOk = "Merci pour votre description ";
    const messageSelect = "Veuillez choisir un type d'événement. ";

    eventTitle.oninput = validateTitle;
    eventDate.oninput = validateDate;
    eventTextareaSingle.oninput = validateTextarea;
    eventSelect.oninput = validateSelect;

    function validateTitle(event) {
        if (eventTitle.value.length >= 3) {
            iconControl6.innerHTML = checkEvent;
            formErrorAddEvent1.innerHTML = "";
        } else {
            formErrorAddEvent1.removeAttribute('hidden');
            formErrorAddEvent1.innerHTML = messageTitle;
            iconControl6.innerHTML = noCheckEvent;
            formErrorAddEvent1.style.color = formErrorColorEvent;
        }
    }

    function validateDate(event) {
        if (eventDate) {
            iconControl7.innerHTML = checkEvent;
            formErrorAddEvent1.innerHTML = "";
        } else {
            formErrorAddEvent1.removeAttribute('hidden');
            formErrorAddEvent1.innerHTML = messageDate;
            iconControl7.innerHTML = noCheckEvent;
            formErrorAddEvent1.style.color = formErrorColorEvent;
        }
    }

    function validateTextarea(event) {
        if (eventTextareaSingle.value.length >= 50) {
            formErrorAddEvent2.removeAttribute('hidden');
            formErrorAddEvent2.innerHTML = messageTextareaOk;
            iconControl10.innerHTML = checkEvent;
            formErrorAddEvent2.style.color = formErrorColorEventOk;
        } else {
            formErrorAddEvent2.removeAttribute('hidden');
            formErrorAddEvent2.innerHTML = messageTextarea;
            iconControl10.innerHTML = noCheckEvent;
            formErrorAddEvent2.style.color = formErrorColorEvent;
        }
    }

    function validateSelect(event) {
        console.log('coucou');
        if (eventSelect) {
            console.log('OK');
            iconControl11.innerHTML = checkEvent;
            // formErrorAddEvent3.innerHTML = "";
        } //else {
        //     console.log('PAS OK');
        //     formErrorAddEvent1.removeAttribute('hidden');
        //     formErrorAddEvent1.innerHTML = messageSelect;
        //     iconControl11.innerHTML = noCheckEvent;
        //     formErrorAddEvent3.style.color = formErrorColorEvent;
        // }
    }
}