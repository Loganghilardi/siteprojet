<form method="post" action="index.php">
    <p><strong>Pseudo</strong></p>
    <input type="text" name="pseudo" class="form-control" placeholder="logan_77">
    <p><strong>Mot de passe</strong></p>
    <input type="password" name="pass" class="form-control" placeholder="***">
    <button type="submit" class="btn btn-primary" style="margin: 5px">Se Connecter</button>
</form>


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
if($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    if(!empty($_POST['pseudo'] )){
$pseudo =$_POST['pseudo'];
    $pass = $_POST[ 'pass' ];
/* compare le pseudo a la bdd */
$req = $bdd->prepare('SELECT id, pass FROM compte WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $pseudo));
$resultat = $req->fetch();

/* compare le mdp a celui de la bdd */
$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);}
/* si le pseudo correspond pas */
    if(!empty($resultat)){
if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    /* si le pseudo et le mdp correspond a celui de la bdd */
    if ($isPasswordCorrect) {
       
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';    
        header('Refresh: 0'); 
        
     
        
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}
}
}
?>
