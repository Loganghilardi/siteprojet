<?php session_start(); ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Liste des Relèves/Détachements</title>
    <link rel="shortcut icon" type="image/x-icon" href="Capture.PNG">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        .container {
            width: 75%;
        }

        button {


            margin-top: 2px;
            margin-right: 1px;
        }

    </style>
</head>

<body style="background-color: grey;">
<div class="container" style="background-color: white;">


    <?php include 'menu.php';


    if (!isset($_SESSION['pseudo'])) {
        echo '<div style="text-align: center;"><span  style="color: red; font-size: medium; "><b>Vous devez vous connecter pour acceder à la page </div></font><br />';
    } else {
        try {
            // On se connecte à MySQL
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
        }
        ?>
        <div class="row">
            <div class="col-lg-5">
                <form method="post" action="index5.php">
                    <label>Matricule
                        <input style="width: 179px " type="text" name="matricule">
                    </label></br>
                    <label>Nom

                        <input style="margin-left: 24px" type="text" name="nom">
                    </label>
                    <label>Prénom

                        <input type="text" name="prenom">
                    </label></br>
                    <label>Coupon

                        <input type="text" name="coupon">
                    </label>
                    <label>Année

                        <input style="margin-left: 9px" type="text" name="annee">
                    </label>


                </form>
            </div>
            <div class="col-lg-5">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" disabled
                        style="width: 75px">OK
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suppmodal  "
                        style="width: 75px">
                    Exécuter
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suppmodal  " disabled
                        style="width: 75px">
                    Trier...
                </button>
                </br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suppmodal  ">
                    Annuler
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suppmodal  "
                        style="width: 75px">
                    Nouveau
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suppmodal  "
                        style="width: 75px">
                    Aide
                </button>

            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table table-hover" style="background: whitesmoke; border: solid 2px black">
                    <thead>
                    <tr>
                        <th>Année</th>
                        <th>Catégorie</th>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>N°Coupon</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>


        </div>


    <?php } ?>
</body>

</html>
