<?php
include 'connexionBdd.php';

// récupération des variables du formulaire 
$id = $_POST['id'];

//Hachage du mot de passe 
$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);


//  Récupération de l'utilisateur et de son pass hashé

try {
    $req = $bdd->prepare("UPDATE users SET mdp = :mdp WHERE id = :id");
    $req->execute(array(
        'mdp' => $mdp,
        'id' => $id
    ));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


header('Location: ../page_php/editCompte.php');
