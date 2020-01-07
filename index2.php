

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
{ ?>
   <div class="row">
			<div class="col-lg-2 hidden-sm hidden-xs hidden-md" id="bande"></div>
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
				<table class="table table-hover" style="background-color: white;">
				<thead>
					<tr>
						<th>Année</th>
						<th>Fermée</th>
					</tr>
				</thead>
				<tbody >
					<tr>
						<td>2000</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2001</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2002</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2003</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2004</td>
						<td><input type="checkbox" name="choix" checked></td>
					</tr>
					<tr>
						<td>2005</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2006</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2007</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2008</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2009</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2010</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2011</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2012</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2013</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2014</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2015</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2016</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2017</td>
						<td><input type="checkbox" name="choix"checked></td>
					</tr>
					<tr>
						<td>2018</td>
						<td><input type="checkbox" name="choix"></td>
					</tr>
					<tr>
						<td>2019</td>
						<td><input type="checkbox" name="choix"></td>
					</tr>
					
				</tbody>
			</table>
		</div>
		<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12" style="margin: 1vh;">
				<div class="btn-group" role="group" aria-label="Exemple">
					<button type="button" class="btn btn-primary">Ajouter une ligne</button>
					<button type="button" class="btn btn-primary">Supprimer une ligne</button>
				</div>
		</div>
			<div class="col-lg-2 col-md-3 col-sm-7 col-xs-12" style="margin-top: 80vh;">

					<a href="maquette.php"><button type="button" class="btn btn-primary " > Valider</button></a>
					<a href="maquette.php"><button type="button" class="btn btn-primary">Annuler</button></a>
			</div>
			

		</div>
<?php } ?>










</body>




</html>