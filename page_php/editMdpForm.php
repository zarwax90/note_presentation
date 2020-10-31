<?php
session_start();
if (isset($_SESSION['id'])) {
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
            <form method="POST" action="../php/editMdp.php">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Mot de passe actuel</label>
                        <input type="password" placeholder="Mot de passe actuel" class="form-control" id="inputPassword4" name="mdp" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Nouveau mot de passe</label>
                        <input type="password" placeholder="Nouveau mot de passe" class="form-control" id="inputPassword4" name="newMdp" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Confirmer votre mot de passe</label>
                        <input type="password" placeholder="Confirmer votre mot de passe" class="form-control" id="inputPassword4" name="newMdp2" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>

    </html>
<?php } else {
    echo "Vous n'êtes pas connecté !";
} ?>