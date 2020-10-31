var validNom = document.getElementById("nom");
var validPrenom = document.getElementById("prenom");
/*var validMail = document.getElementById("mail");
var validTel = document.getElementById("tel");
var validDiscord = document.getElementById("discord");
var validPseudo = document.getElementById("pseudo");
var validMdp = document.getElementById("mdp");*/

var missNom = document.getElementById("missNom");

validNom.addEventListener("input", verificationNom);
syntaxe = /[0-9]/;
syntaxe2 = /[a-z]/;
syntaxe3 = /[!#$%&'*+/=?^_`{|}~-]/;

function verificationNom(event) {
    if (validNom.validity.valueMissing) {
        event.preventDefault();
        missNom.textContent = "Nom manquant";
        missNom.style.color = "red";
        validNom.setCustomValidity("Veuillez renseigner un nom.");
    } else if (syntaxe.test(validNom.value)) {
        event.preventDefault();
        missNom.textContent = "Numéro non autorisé";
        missNom.style.color = "red";
        validNom.setCustomValidity("Veuillez renseigner un nom correct.");

    } else if (syntaxe3.test(validNom.value)) {
        event.preventDefault();
        missNom.textContent = "Caractère incorrect";
        missNom.style.color = "red";
        validNom.setCustomValidity("Syntaxe incorrect");
    } else {
        missNom.textContent = "";
        validNom.setCustomValidity("");

    }
}

var emailRegExp = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;