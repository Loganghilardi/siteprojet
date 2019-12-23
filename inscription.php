

<form method="post" action="index.php">
	<p><strong>Pseudo</strong></p>
	<input type="text" name="pseudo" class="form-control" placeholder="logan_77">
	<p><strong>Mot de passe</strong></p>
	<input type="password" name="pass" class="form-control" placeholder="***">
	<p><strong>Mail</strong></p>
	<input type="text" name="email" class="form-control" placeholder="adress@email.com">
	
  <button type="submit" style="margin: 5px" class="btn btn-primary">S'inscrire</button>
</form>
<?php


?>

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

<?php
/* si le formulaire a ete envoyé */
if($_SERVER['REQUEST_METHOD'] === 'POST') {

	$pseudo =$_POST['pseudo'];
	$pass = $_POST[ 'pass' ];
	$email = $_POST['email'];

	$pass_hache = password_hash($pass, PASSWORD_BCRYPT);
	?><?php

/* verifie si pas de doublon de pseudo */
	
	$req = $bdd->prepare('SELECT pseudo FROM compte WHERE pseudo=:pseudo');
		$req->execute(array(
			'pseudo' => $pseudo));
				$resultat = $req->fetch();
		


		
		/* verifie si les champs ont été remplis */

			if(!empty($pseudo & $pass & $email)){
					/* si pseudo disponible alors on ecrit dans la bdd et on connecte */	
				if(!$resultat){

						$req = $bdd->prepare('INSERT INTO compte(pseudo, pass, email) VALUES(:pseudo, :pass, :email)');
						$req->execute(array(
						    'pseudo' => $pseudo,
						    'pass' => $pass_hache,
						    'email' => $email));
						$_SESSION['pseudo'] = $pseudo;
						 header('Refresh: 0');
						
						

						}
					

				else{
			
					?><p>Pseudo non valide ou indisponible</p><?php
					}

			
			
}
/* previens que les champs sont pas tous rempli */
else{ echo "Tout les champs doivent être rempli! ";}
}	


	

	

	
	




	

