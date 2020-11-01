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

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Présentateur</th>
                <th scope="col">Attitude</th>
                <th scope="col">Voix</th>
                <th scope="col">Présentation</th>
                <th scope="col">Fond</th>
            </tr>
        </thead>
        <tbody>
            <?php

            try {
                $req = $bdd->prepare("SELECT pres, ROUND (AVG(attitude),2) AS attitude, ROUND (AVG(voix),2) AS voix, ROUND (AVG(presentation),2) AS presentation, ROUND (AVG(fond),2) AS fond FROM notes GROUP BY pres");
                $req->execute();
            } catch (exception $e) {
                die("Erreur de type " . $e->getMessage());
            }

            while ($donnees = $req->fetch()) {
            ?>
                <tr>
                    <th scope="row"></th>
                    <td><?php echo $donnees['pres'] ?></td>
                    <td><?php echo $donnees['attitude']; ?></td>
                    <td><?php echo $donnees['voix']; ?></td>
                    <td><?php echo $donnees['presentation']; ?></td>
                    <td><?php echo $donnees['fond']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>