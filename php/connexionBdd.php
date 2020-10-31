<?php

// variables pour configurer l'accès à la base de données 
$server = "mysql-zarwax90.alwaysdata.net";  // peut-être remplacé par l'adresse IP 
$base  = "zarwax90_presentation";
$userdb = "zarwax90";
$userpwd = "Alexis2308*";

//Ouverture de la connexion vers le moteur de la base de données
try {
    $bdd = new PDO('mysql:host=' . $server . ';dbname=' . $base . ';', $userdb, $userpwd);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}