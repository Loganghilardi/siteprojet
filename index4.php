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

        <div class="row">
            <div class="col-lg-2 hidden-sm hidden-xs hidden-md" id="bande"></div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">





                <table class="table table-responsive table-hover " style="background-color: white;">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Libellé</th>
                            <th>Direction</th>
                            <th>Secteur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="clickable" data-toggle="collapse" data-target="#group-of-rows-1" aria-expanded="false" aria-controls="group-of-rows-1">
                            <td>60ANNIVER</td>
                            <td>60ème anniversaire du CRE</td>
                            <td>DG</td>
                            <td>SECRELU</td>
                        </tr>
                    </tbody>

                    <tbody id="group-of-rows-1" class="collapse" style="border: ">
                        <tr>
                            <td></td>
                            <th>Code</th>
                            <th>Nom</th>
                            <th>Groupe</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Lghilardi</td>
                            <td>Logan Ghilardi</td>
                            <td>Informatique</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>PAUL</td>
                            <td>Muriel PAUL</td>
                            <td>Controle de Gestion</td>
                        </tr>
                    </tbody>


                    <tbody>
                        <tr class="clickable" data-toggle="collapse" data-target="#group-of-rows-2" aria-expanded="false" aria-controls="group-of-rows-2">
                            <td><i class="fa fa-plus" aria-hidden="true"></i></td>
                            <td>data</td>
                            <td>data</td>
                            <td>data</td>
                        </tr>
                    </tbody>
                    <tbody id="group-of-rows-2" class="collapse">
                        <tr>
                            <td>- child row</td>
                            <td>data 2</td>
                            <td>data 2</td>
                            <td>data 2</td>
                        </tr>
                        <tr>
                            <td>- child row</td>
                            <td>data 2</td>
                            <td>data 2</td>
                            <td>data 2</td>
                        </tr>
                    </tbody>
                </table>

                <?php } ?>










</body>




</html>
