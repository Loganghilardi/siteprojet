<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Liste des Fonctions</title>
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
<div class="container-fluid" >

    <?php include 'menu.php';
    if (!isset($_SESSION['pseudo']))
    {
        echo '<center><font color="red" size="4"><b>Vous devez vous connecter pour acceder à la page </center></font><br />';
    }
    else
    {
    try {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : ' . $e->getMessage());
    }
    // Si tout va bien, on peut continuer
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (!empty($_POST['delete'])) {
            $supp = $_POST['delete'];
            $req = $bdd->prepare("DELETE FROM fonction WHERE Code = :supp");
            $req->bindParam(':supp', $supp, PDO::PARAM_STR_CHAR);
            $req->execute();


        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['code'])) {
            $Code = $_POST['code'];
            $Libellé = $_POST['libelle'];
            $req = $bdd->prepare('INSERT INTO fonction(Code, Libellé) VALUES(:code, :libelle)');
            $req->execute(array(
                'code' => $Code,
                'libelle' => $Libellé));
            header('Refresh: 0');
        }
    }
    // On récupère tout le contenu de la table
    $reponse = $bdd->query('SELECT * FROM fonction ORDER BY Code ASC '); ?>
    <table class=" table table-hover" style="background-color: white;" >
        <thead>
        <tr>
            <th>Code</th>
            <th>Libellé</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch()) {
            ?>
            <tr>
                <td><?php echo $donnees['Code']; ?></td>
                <td> <?php echo $donnees['Libellé']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php
    /* si le formulaire a ete envoyé */
    ?>
    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12" style="margin: 1vh;">
        <div class="btn-group" role="group" aria-label="Exemple">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Ajouter
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suppmodal  ">
                Supprimer
            </button>
        </div>
    </div>
    <!-- modale -->
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
                    <form method="post" action="index3.php">
                        <p><strong>Code</strong></p>
                        <input type="text" name="code" class="form-control" placeholder="">
                        <p><strong>Libellé</strong></p>
                        <input type="text" name="libelle" class="form-control" placeholder="">
                        <button type="submit" style="margin: 5px" class="btn btn-primary">Ajouter</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="suppmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="index3.php">
                        <input type="text" name="delete">
                        <button type="submit" class="btn btn-primary">Supprimer une ligne</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
</body>

</html>
