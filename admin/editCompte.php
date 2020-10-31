<?php
session_start();
include '../php/connexionBdd.php';

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
    <?php include("navbar.php"); ?>
    
    <div class="container">
        <form method="POST" action="../php/edit.php">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputState">Utilisateur</label>
                    <select id="inputState" name="id" class="form-control">
                        <optgroup label="Professeur">
                            <?php
                            try {
                                $req = $bdd->prepare("SELECT * FROM users WHERE type = 'prof'");
                                $req->execute();
                            } catch (exception $e) {
                                die("Erreur de type " . $e->getMessage());
                            }
                            while ($donnees = $req->fetch()) {
                            ?>
                                <option value="<?php echo $donnees['id'] ?>"> <?php echo $donnees['nom'] . " " . $donnees['prenom']; ?></option>
                            <?php
                            }
                            ?>
                        </optgroup>
                        <optgroup label="Élèves">
                            <?php

                            try {
                                $req = $bdd->prepare("SELECT * FROM users WHERE type = 'eleve' ");
                                $req->execute();
                            } catch (exception $e) {
                                die("Erreur de type " . $e->getMessage());
                            }

                            while ($donnees = $req->fetch()) {
                            ?>
                                <option value="<?php echo $donnees['id'] ?>"> <?php echo $donnees['nom'] . " " . $donnees['prenom']; ?></option>
                            <?php
                            }
                            ?>
                        </optgroup>

                    </select>

                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Mot de passe</label>
                    <input type="password" placeholder="Mot de passe" class="form-control" id="inputPassword4" name="mdp">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>