<?php session_start(); ?>

<form method="post" action="index5.php">
    <p><strong>Code</strong></p>
    <input type="text" name="code" class="form-control" placeholder="logan_77">
    <p><strong>Libellé</strong></p>
    <input type="password" name="libelle" class="form-control" placeholder="***">


    <button type="submit" style="margin: 5px" class="btn btn-primary">S'inscrire</button>
</form>

<?php
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

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM fonction');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
<p>
    <strong>Jeu</strong> : <?php echo $donnees['Code']; ?><br />
    Le possesseur de ce jeu est : <?php echo $donnees['Code']; ?>, et il le vend à <?php echo $donnees['Code']; ?> euros !<br />
    Ce jeu fonctionne sur <?php echo $donnees['Libellé']; ?> et on peut y jouer à <?php echo $donnees['Code']; ?> au maximum<br />
    <?php echo $donnees['Libellé']; ?> a laissé ces commentaires sur <?php echo $donnees['Libellé']; ?> : <em><?php echo $donnees['Libellé']; ?></em>
</p>
<?php
}



/* si le formulaire a ete envoyé */
if($_SERVER['REQUEST_METHOD'] === 'POST') {

	$Code =$_POST['code'];
	$Libellé = $_POST[ 'libelle' ];
    $req = $bdd->prepare('INSERT INTO fonction(Code, Libellé) VALUES(:code, :libelle)');
						$req->execute(array(
						    'code' => $Code,
						    'libelle' => $Libellé));
						 header('Refresh: 0');
    
}
else{ echo "Tout les champs doivent être rempli! ";}




	?>
<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12" style="margin: 1vh;">
    <div class="btn-group" role="group" aria-label="Exemple">
        <button type="button" id="btn" class="btn btn-primary">Ajouter une ligne</button>
        <button type="button" class="btn btn-primary">Supprimer une ligne</button>
    </div>
</div>
