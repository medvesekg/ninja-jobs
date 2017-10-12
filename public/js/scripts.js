var postItNotes = document.getElementsByClassName("postit-note");
var greyedOut = document.getElementById("greyed-out-background");
var postItNotesClose = document.getElementsByClassName("postit-note-close");
var signUpButton = document.getElementById("sign-up-button");
var signUpFormModal = document.getElementById("sign-up-form-modal");
var loginModalLoginCorner = document.getElementById('login-modal-login-corner');
var signupModalLoginCorner = document.getElementById('login-modal-signup-corner');
var modalLoginForm = document.getElementById('modal-login-form');
var modalSignupForm = document.getElementById('modal-signup-form');
var mobileMenuButton = document.getElementById('mobile-menu-button');
var mobileMenuModal = document.getElementById('mobile-menu-modal');

/* Sets the post it notes in focus on click */
for (var i = 0; i < postItNotes.length; i++) {
    postItNotes[i].onclick = function () {


            this.classList.add("in-focus");
            greyedOut.classList.add("visible");


    }
}
/* Puts the post it notes back on the board on click of the X close button */
/* This has to be set on a timeout as otherwise the parent click function fires immediately after and adds the classes right back */
for (var j = 0; j < postItNotesClose.length; j++) {
    postItNotesClose[j].onclick = function() {


            var postitNote = this.parentNode;
            setTimeout(function() {
                putPostitNoteBack(postitNote)
            }, 10);


    }
}

function putPostitNoteBack(postitNote) {

    postitNote.classList.remove("in-focus");
    greyedOut.classList.remove("visible");
}

/* Puts the post it notes back on the board if the user clicks the greyed out background */
greyedOut.onclick = function() {

    for (var i = 0; i < postItNotes.length; i++) {
        postItNotes[i].classList.remove("in-focus");
    }

    greyedOut.classList.remove("visible");
    
    if (signUpFormModal.classList.contains('visible')) {
        signUpFormModal.classList.remove('visible');
    }

    if (mobileMenuModal.classList.contains("visible")) {
        mobileMenuModal.classList.remove("visible")
    }


}

if (signUpButton) {
    signUpButton.onclick = function () {
        signUpFormModal.classList.add("visible");
        greyedOut.classList.add("visible");
    }
}

loginModalLoginCorner.onclick = function() {

    if (signUpFormModal.classList.contains('signup-form')) {

        signUpFormModal.classList.remove('signup-form');
        signUpFormModal.classList.add('login-form');

        modalLoginForm.style.display = "block";
        modalSignupForm.style.display = "none";

    }

}

signupModalLoginCorner.onclick = function() {

    if(signUpFormModal.classList.contains('login-form')) {

        signUpFormModal.classList.remove('login-form');
        signUpFormModal.classList.add('signup-form');

        modalLoginForm.style.display = "none";
        modalSignupForm.style.display = "block";





    }
}

mobileMenuButton.onclick = function() {


        mobileMenuModal.classList.add('visible');
        greyedOut.classList.add("visible");


}