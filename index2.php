

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
  			.btn-group{float: right;
  			margin-top: 7px;
  			margin-right: 2px;}
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
{
    echo $_SESSION['pseudo'];
}

?>








</body>




</html>