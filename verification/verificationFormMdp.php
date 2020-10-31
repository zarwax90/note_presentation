<?php
session_start();
include '../php/connexionBdd.php';

$req = $bdd->prepare("SELECT * FROM users WHERE id = :id");
$req->execute(array(
    'id' => $id
));
$resultat = $req->fetch();

$isPasswordCorrect = password_verify($_POST['mdp'], $resultat['mdp']);
?>
<script>
    validMdp = document.getElementById("mdp");
    var validNewMdp = document.getElementById("newMdp");
    var validNewMdp2 = document.getElementById("newMdp2");

    validNom.addEventListener("input", verificationNom);

    function verificationMdp(event) {
        if (validNom.validity.valueMissing) {
            event.preventDefault();
            validNom.setCustomValidity("Veuillez renseigner un votre mot de passe actuel.");
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
</script>