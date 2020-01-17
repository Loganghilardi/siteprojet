<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Années de références</title>
    <link rel="shortcut icon" type="image/x-icon" href="Capture.PNG">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        .btn-group {
            float: right;
            margin-top: 7px;
            margin-right: 2px;
        }
    </style>
</head>
<body style="background-color: grey;">
<div class="container-fluid" style="background-color: grey;">
    <?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    ?>

    <?php include 'menu.php' ?>
    <?php
    if (!isset($_SESSION['pseudo']))
    {
        echo '<center><font color="red" size="4"><b>Vous devez vous connecter pour acceder à la page </center></font><br />';
    }
    else
    {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['modif'])) {
            $modif = $_POST['modif'];
            $annee = $_POST['varpost'];
            $req = $bdd->prepare('UPDATE exercice SET Fermée = "' . $modif . '" WHERE Annee =   "' . $annee . '" ');
            $req->execute(array(
                $_POST['modif']));
        }
    }
    if (!empty($_POST['postdelete'])) {
        $annee = $_POST['postdelete'];
        $req = $bdd->prepare("DELETE FROM exercice WHERE Annee = :annee");
        $req->bindParam(':annee', $annee, PDO::PARAM_INT);
        $req->execute();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['annee'])) {
            $Annee = $_POST['annee'];
            $Fermée = $_POST['fermee'];
            $req = $bdd->prepare('INSERT INTO exercice(Annee, Fermée) VALUES(:annee, :fermee)');
            $req->execute(array(
                'annee' => $Annee,
                'fermee' => $Fermée));
            header('Refresh: 0');
        }
    }
    ?>
    <div class="row">
        <div class="col-lg-2 hidden-sm hidden-xs hidden-md" id="bande"></div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">

            <?php

            $reponse = $bdd->query('SELECT * FROM exercice ORDER BY Annee DESC'); ?>
            <table class="table table-hover" style="background-color: white;">
                <thead>
                <tr>
                    <th>Annee</th>
                    <th>Fermée</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // On affiche chaque entrée une à une
                while ($donnees = $reponse->fetch()) {
                    $oui = "Oui";
                    ?>
                    <tr>
                        <td><?php echo $donnees['Annee']; ?></td>
                        <td> <?php
                            if ($donnees['Fermée'] == $oui) {
                                echo 'Oui';
                            } else {
                                echo 'Non';
                            } ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12" style="margin: 1vh;">

            <div class="btn-group" role="group" aria-label="Exemple">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Ajouter
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modifmodal">
                    Modifier
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suppmodal  ">
                    Supprimer
                </button>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajout</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="index2.php">
                                <p><strong>Année</strong></p>
                                <input type="text" name="annee" class="form-control" placeholder="0000">
                                <input type="radio" name="fermee" value="Non" id="Non" checked="checked"/> <label
                                        for="Non">Ouverte</label>
                                <input type="radio" name="fermee" value="Oui" id="Oui"/> <label for="Oui">Fermée</label>
                                <button type="submit" style="margin: 5px" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modifmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modifier</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="index2.php">
                                <label>Année à modifier </label></br>
                                <input type="text" name="varpost">
                                <input type="radio" name="modif" value="Non" id="Non" checked="checked"/><label
                                        for="Non">Ouverte</label>
                                <input type="radio" name="modif" value="Oui" id="Oui"/><label for="Oui">Fermée</label>
                                <button type="submit">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="suppmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="index2.php">
                                <input type="text" name="postdelete">
                                <button type="submit" class="btn btn-primary">Supprimer une ligne</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>


</body>


</html>
