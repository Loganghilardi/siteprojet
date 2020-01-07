<?php session_start(); ?>



<!DOCTYPE html>
<html>

<head>
    <title>Site</title>
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

<body>
    <div class="container-fluid" style="background-color: grey;">


        <?php
	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
?>





        <?php include 'menu.php' ?>

        <?php



/* Empeche l'acces si pas connecter */ 
if (!isset($_SESSION['pseudo']))
{
    echo '<center><font color="red" size="4"><b>Vous devez vous connecter pour acceder à la page </center></font><br />';
}
else
{ ?>
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-2 hidden-sm hidden-xs hidden-md" id="bande"></div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <table id="tab" class="table table-hover" style="background-color: white;">
                        <thead>
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Libellé</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"> A</th>
                                <td>Animateur</td>
                            </tr>
                            <tr>
                                <th scope="row">AF</th>
                                <td>Adjoint Financier</td>
                            </tr>
                            <tr>
                                <th scope="row">BB</th>
                                <td>Bibliothécaire Bénévole</td>
                            </tr>
                            <tr>
                                <th scope="row">D</th>
                                <td>Directeur</td>
                            </tr>
                            <tr>
                                <th scope="row">DA</th>
                                <td>Directeur Pédagogique Adjoint</td>
                            </tr>
                            <tr>
                                <th scope="row">F</th>
                                <td>Formation</td>
                            </tr>
                            <tr>
                                <th scope="row">OT</th>
                                <td>Autres</td>
                            </tr>
                            <tr>
                                <th scope="row">SA</th>
                                <td>Service Accueil</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12" style="margin: 1vh;">
                    <div class="btn-group" role="group" aria-label="Exemple">
                        <button type="button" id="btn" class="btn btn-primary">Ajouter une ligne</button>
                        <button type="button" class="btn btn-primary">Supprimer une ligne</button>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-7 col-xs-12" style="margin-top: 20vh;">

                    <button id="test" type="button" class="btn btn-primary">Valider</button>
                    <a href="maquette.php"><button type="button" class="btn btn-primary">Annuler</button></a>
                </div>





            </div>
        </div>

        <?php } ?>










</body>




</html>
