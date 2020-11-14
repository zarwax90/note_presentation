<?php
include '../php/connexionBdd.php';

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.php">Présentation</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <?php if (isset($_SESSION['id']) and isset($_SESSION['nom']) and isset($_SESSION['prenom'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="presentation.php">Noter une présentation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mesNotes.php">Mes notes</a>
                </li>
                <?php if ($_SESSION['type'] === "prof" or $_SESSION['nom'] === "PETIT") { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="viewNote.php">Voir toutes les notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="moyenne.php">Voir les moyennes</a>
                    </li>
                <?php } else {} ?>

            <?php } else { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="connexionForm.php">Connexion</a>
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
                        <a class="dropdown-item" href="editMdpForm.php">Modifier mon mot de passe</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../php/deconnexion.php">Se déconnecter</a>
                    </div>
                </li>
            </ul>
        <?php } else {
        } ?>
    </div>
</nav>