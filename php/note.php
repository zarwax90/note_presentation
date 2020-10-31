<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" href="../images/dragon.png" />
    <title>Présentation</title>
</head>

<body>
    <?php
    include("navbar.php");

    if (isset($_SESSION['id'])) {
        // récupération des variables du formulaire 
        $user = $_SESSION['nom'] . " " . $_SESSION['prenom'];
        $pres = $_POST['pres'];
        $attitude = $_POST['attitude'];
        $voix = $_POST['voix'];
        $presentation = $_POST['presentation'];
        $fond = $_POST['fond'];

        include 'connexionBdd.php';

        //  Récupération de l'utilisateur et de son pass hashé
        $req = $bdd->prepare("INSERT INTO notes (pres, user, attitude, voix, presentation, fond) VALUES(:pres, :user, :attitude, :voix, :presentation, :fond)");
        $req->execute(array(
            'pres' => $pres,
            'user' => $user,
            'attitude' => $attitude,
            'voix' => $voix,
            'presentation' => $presentation,
            'fond' => $fond
        ));
        $resultat = $req->fetch();

    ?>
        <script>
            window.setTimeout("location=('../page_php/presentation.php');", 3000);
        </script>
        <p class="text-center"><strong>Vos notes ont bien été reçu, redirection dans 3 secondes...</strong></p>
        <div class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
                <span class="sr-only">Redirection...</span>
            </div>
        </div>
    <?php
    } else {
    ?>
        <script>
            window.setTimeout("location=('../page_php/connexionForm.php');", 3000);
        </script>
        <p class="text-center"><strong>Vous n'êtes pas connecté...</strong></p>
        <div class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
                <span class="sr-only">Redirection...</span>
            </div>
        </div>
    <?php
    } ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>