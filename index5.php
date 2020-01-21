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

        .btn {
            border-radius: 0px;
        }

        .btn-group {
            float: right;
            margin-top: 7px;
            margin-right: 2px;
        }

        button {


            margin-top: 2px;
            margin-right: 1px;
        }

    </style>
</head>

<body style="background-color: #f0f0f0;">
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

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="matricule">Matricule</label>
                        <input type="text" class="form-control" id="matricule" placeholder="XXXXXX">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" placeholder="Nom">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" placeholder="Prénom">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="coupon">Coupon</label>
                        <input type="text" class="form-control" id="coupon" placeholder="N°Coupon">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="annee">Année</label>
                        <input type="text" class="form-control" id="annee" placeholder="XXXX">
                    </div>
                </div>

            </form>
        </div>


        <div class="col-lg-6" style=" text-align: right">
            <button type="button" class=" btn btn-light" data-toggle="modal" data-target="#exampleModal" disabled
                    style="width: 75px">OK
            </button>
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#suppmodal  "
                    style="width: 75px">
                Exécuter
            </button>
            <button type="button" class="btn light" data-toggle="modal" data-target="#suppmodal  " disabled
                    style="width: 75px;">
                Trier...
            </button>
            <br>
            <button type="button" class="btn light" data-toggle="modal" data-target="#suppmodal  ">
                Annuler
            </button>
            <button type="button" class="btn light" data-toggle="modal" data-target="#exampleModal"
                    style="width: 75px">
                Nouveau
            </button>
            <button type="button" class="btn light" data-toggle="modal" data-target="#suppmodal  "
                    style="width: 75px">
                Aide
            </button>

        </div>

    </div>
    <div class="row" style="margin-top: 20px">
        <div class="col-lg-12 " style=" overflow: auto">
            <table class="table table-hover" style="background: whitesmoke; border: solid 2px #cfcfcf; ">
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
                            <button type="submit" style="margin: 5px" class="btn btn-light">Ajouter</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php } ?>
</body>

</html>
