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

        include 'connexionBdd.php';

        // récupération des variables du formulaire 
        $mdp = $_POST['mdp'];
        $newMdp = password_hash($_POST['newMdp'], PASSWORD_DEFAULT);



        //  Récupération de l'utilisateur et de son pass hashé
        $req = $bdd->prepare("SELECT * FROM users WHERE id = :id");
        $req->execute(array(
            'id' => $_SESSION['id']
        ));
        $resultat = $req->fetch();

        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['mdp'], $resultat['mdp']);

        if (!$resultat) {
    ?>
            <script>
                window.setTimeout("location=('../page_php/editMdpForm.php');", 3000);
            </script>
            <p class="text-center"><strong>Une erreur s'est produite...</strong></p>
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Redirection...</span>
                </div>
            </div>
            <?php
        } else {
            if ($isPasswordCorrect) {
                try {
                    $req = $bdd->prepare("UPDATE users SET mdp = :mdp WHERE id = :id");
                    $req->execute(array(
                        'mdp' => $newMdp,
                        'id' => $_SESSION['id']
                    ));
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
            ?>

                <script>
                    window.setTimeout("location=('../page_php/presentation.php');", 3000);
                </script>
                <p class="text-center"><strong>Mot de passe modifié avec succès...</strong></p>
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Redirection...</span>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <script>
                    window.setTimeout("location=('../page_php/editMdpForm.php');", 3000);
                </script>
                <p class="text-center"><strong>Une erreur s'est produite...</strong></p>
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Redirection...</span>
                    </div>
                </div>
    <?php
            }
        }
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