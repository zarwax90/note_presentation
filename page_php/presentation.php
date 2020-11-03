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
    <?php include("navbar.php"); ?>

    <div class="container">
        <form method="POST" action="../php/note.php">
            <div class="form-row">
                <div class="form-group col-md-3.5">
                    <label for="inputState">Présentateur</label>
                    <select id="inputState" name="pres" class="form-control" required>
                        <option value="" disabled selected>--Selectionner un présentateur--</option>
                        <?php

                        try {
                            $req = $bdd->prepare("SELECT nom,prenom FROM users WHERE type = 'eleve' AND id != :id ");
                            $req->execute(array(
                                'id' => $_SESSION['id']
                            ));
                        } catch (exception $e) {
                            die("Erreur de type " . $e->getMessage());
                        }

                        while ($donnees = $req->fetch()) {
                        ?>
                            <option value="<?php echo $donnees['nom'] . " " . $donnees['prenom']; ?>"> <?php echo $donnees['nom'] . " " . $donnees['prenom']; ?></option>
                        <?php
                        }
                        ?>

                    </select>

                </div>
                <div class="form-group col-md-2">
                    <label for="inputState">Attitude</label>
                    <select id="inputState" class="form-control" name="attitude" required>
                        <option value="" disabled selected>--Attitude--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputState">Voix</label>
                    <select id="inputState" class="form-control" name="voix" required>
                        <option value="" disabled selected>--Voix--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputState">Présentation</label>
                    <select id="inputState" class="form-control" name="presentation" required>
                        <option value="" disabled selected>--Présentation--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputState">Fond</label>
                    <select id="inputState" class="form-control" name="fond" required>
                        <option value="" disabled selected>--Fond--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary col-md-11">Noter</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>