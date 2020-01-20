<?php session_start(); ?>


<!DOCTYPE html>
<html>

<head>
    <title>Liste des Relèves/Détachements</title>
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
        ?>
    </div>
    <?php } ?>

    <?php if(isset($_POST['go'])) {
        echo 'ouiiiiii';

    }
    ?>
    <form method="post" action="index5.php">
        <input type="submit" value="envoyer" name="go" />
    </form>
</body>

</html>
