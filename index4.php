<?php session_start(); ?>



<!DOCTYPE html>
<html>

<head>
    <title>Liste des Utilisateurs par Motif </title>
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
    <div class="container-fluid">


        <?php include 'menu.php' ;
if (!isset($_SESSION['pseudo']))
{
    echo '<center><font color="red" size="4"><b>Vous devez vous connecter pour acceder à la page </center></font><br />';
}
else
{ 
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}




$reponse = $bdd->query('SELECT * FROM motif'); ?>

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
                <?php 
while ($donnees = $reponse->fetch())
{
    ?>

                <tr>
                    <td><?php echo $donnees['code']  ; ?></td>
                    <td><?php echo $donnees['libelle']  ; ?></td>
                    <td><?php echo $donnees['direction']  ; ?></td>
                    <td><?php echo $donnees['service']  ; ?></td>
                </tr>


                <?php } ?>
            </tbody>

        </table>

        <?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code =$_POST['code'];
    $libelle =$_POST['libelle'];
    $direction =$_POST['direction'];
    $service =$_POST['service'];
    
    
    $req = $bdd->prepare('INSERT INTO motif(code,libelle,direction,service) VALUES (:code, :libelle, :direction, :service)');
        $req->execute(array(
        'code' => $code,
        'libelle' => $libelle,
        'direction' => $direction,
        'service' => $service));
        header('refresh: 0');
    
}?>



        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12" style="margin: 1vh;">
            <div class="btn-group" role="group" aria-label="exemple">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter</button>
            </div>
        </div>
<?php  } ?>
        <div class="modal fade col-lg-2" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="align-center">
            <div class="modsal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-tittle" id="exampleModalLabel">Ajout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <form method="post" action="index4.php">
                            <p>Code</p>
                            <input type="text" name="code" class="form-control">
                            <p>Libellé</p>
                            <input type="text" name="libelle" class="form-control">
                            <p>Direction</p>
                            <input type="text" name="direction" class="form-control">
                            <p>Secteur</p>
                            <input type="text" name="service" class="form-control">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
