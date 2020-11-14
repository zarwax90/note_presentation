<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/dragon.png" />
    <title>Présentation</title>
</head>

<body>
    <?php
    include 'php/connexionBdd.php';

    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Présentation</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <?php if (isset($_SESSION['id']) and isset($_SESSION['nom']) and isset($_SESSION['prenom'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="page_php/presentation.php">Noter une présentation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="page_php/mesNotes.php">Mes notes</a>
                    </li>
                    <?php if ($_SESSION['type'] === "prof"  or $_SESSION['nom'] === "PETIT") { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="page_php/viewNote.php">Voir toutes les notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page_php/moyenne.php">Voir les moyennes</a>
                        </li>
                    <?php } else {
                    } ?>

                <?php } else { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="page_php/connexionForm.php">Connexion</a>
                    </li>
                <?php } ?>
            </ul>
            <?php if (isset($_SESSION['id']) and isset($_SESSION['nom']) and isset($_SESSION['prenom'])) { ?>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom']; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="page_php/editMdpForm.php">Modifier mon mot de passe</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="php/deconnexion.php">Se déconnecter</a>
                        </div>
                    </li>
                </ul>
            <?php } else { ?>
            <?php } ?>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>