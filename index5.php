<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Liste des Relèves/Détachements</title>
    <link rel="shortcut icon" type="image/x-icon" href="Capture.PNG">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        .container {
            width: 75%;
        }

        .btn {
            border-radius: 0px;
        }

        .btn-group {
            float: right;
            margin-top: 7px;
            margin-right: 2px;
        }

        #executer {
            position absolute;
            margin-left: 1053px;
            margin-top: -220px;
        }

        button {


            margin-top: 2px;
            margin-right: 1px;
        }

        input {
            border-radius: 0px;
        }

    </style>
</head>

<body style="background-color: #f0f0f0;">
<div class="container" style="background-color: white;">


    <?php include 'menu.php';


    if (!isset($_SESSION['pseudo'])) {
        echo '<div style="text-align: center;"><span  style="color: red; font-size: medium; "><b>Vous devez vous connecter pour acceder à la page </div></font><br />';
    } else {
    try {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : ' . $e->getMessage());

    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //recup des données

        /* ajout a la bdd */
        if (!empty($_POST['njour'])) {


            $categorie = $_POST['ncategorie'];
            $matricule = $_POST['nmatricule'];
            $nom = $_POST['nnom'];
            $prenom = $_POST['nprenom'];
            $coupon = $_POST['ncoupon'];
            $jour = $_POST['njour'];

            $req = $bdd->prepare('INSERT INTO releve(categorie,matricule,nom,prenom,coupon,jour) VALUES (:categorie , :matricule, :nom, :prenom, :coupon, :jour ) ');
            $req->execute(array(
                'categorie' => $categorie,
                'matricule' => $matricule,
                'nom' => $nom,
                'prenom' => $prenom,
                'coupon' => $coupon,
                'jour' => $jour));


        }


    }

    ?>
    <div class="row">
        <!-- formulaire recherche -->


        <form method="post" action="index5.php" id="formrecherche" class="col-lg-12">
            <div class="col-lg-6">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="matricule">Matricule</label>
                        <input type="text" class="form-control" id="matricule" name="matricule">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="coupon">Coupon</label>
                        <input type="text" class="form-control" id="coupon" name="coupon" ">
                    </div>

                </div>
            </div>


            <!-- groupe bouton -->

            <div class="col-lg-6" style=" text-align: center">
                <button type="button" class=" btn btn-light" data-toggle="modal" data-target="#exampleModal"
                        disabled
                        style="width: 75px">OK
                </button>

                <button type="submit" class="btn btn-light"
                        style="width: 75px">
                    Exécuter
                </button>
                <button type="button" class="btn light" data-toggle="modal" data-target="#suppmodal  " disabled
                        style="width: 75px;">
                    Trier...
                </button>
                <br> <a href="index5.php">
                    <button type="button" class="btn light" data-toggle="modal" data-target="#suppmodal  ">
                        Annuler
                    </button>
                </a>
                <button type="button" class="btn light" data-toggle="modal" data-target="#exampleModal"
                        style="width: 75px">
                    Nouveau
                </button>
                <a style="text-decoration: none" href="aide.php">
                    <button type="button" class="btn light"
                            style="width: 75px">
                        Aide
                    </button>
                </a>

            </div>
        </form>
    </div>


    <!-- tableau -->
    <div class="row" style="margin-top: 20px">
        <div class="col-lg-12 " style=" overflow: auto">
            <table class="table table-hover" style="background: whitesmoke; border: solid 2px #cfcfcf; ">
                <thead>
                <tr>

                    <th>Catégorie</th>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>N°Coupon</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php

                if (!empty($_POST['matricule']) || !empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['coupon'])) {
                    //on compare post a chaque champ
                    $rmatricule = $_POST['matricule'];
                    $rnom = $_POST['nom'];
                    $rprenom = $_POST['prenom'];
                    $rcoupon = $_POST['coupon'];
                    $reponse = $bdd->query('SELECT * FROM releve WHERE matricule = "' . $rmatricule . '" OR  nom = "' . $rnom . '" OR prenom = "' . $rprenom . '" OR coupon = "' . $rcoupon . '" ');

                    // if ($rmatricule == $nsm['matricule'] || $rnom == $nsm['nom'] || $rprenom == $nsm['prenom'] || $rcoupon == $nsm['coupon'] ) {

                    while ($nsm = $reponse->fetch()) { ?>
                        <tr>
                            <td><?php echo $nsm['categorie']; ?></td>
                            <td><?php echo $nsm['matricule']; ?></td>
                            <td><?php echo $nsm['nom']; ?></td>
                            <td><?php echo $nsm['prenom']; ?></td>
                            <td><?php echo $nsm['coupon']; ?></td>
                            <td><?php echo $nsm['jour']; ?></td>
                        </tr>
                    <?php }//}
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modale ajout table -->
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
                <div class="modal-body" style="height:  40vh;">
                    <form method="post" action="index5.php">

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                <label for="nnom">Nom</label>
                                <input type="text" class="form-control" placeholder="Nom" name="nnom">
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                <label for="nprenom">Prénom</label>
                                <input type="text" class="form-control" placeholder="Prénom"
                                       name="nprenom">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                <label for="ncoupon">XXXXXX</label>
                                <input type="text" class="form-control" placeholder="Coupon"
                                       name="ncoupon">
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                <label for="nmatricule">Matricule</label>
                                <input type="text" class="form-control" placeholder="Matricule"
                                       name="nmatricule">
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                <label for="njour">Date</label>
                                <input type="date" class="form-control" name="njour">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                <label for="ncategorie">Catégorie</label>
                                <select class="form-control" name="ncategorie">
                                    <option selected>AR</option>
                                    <option>AC</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-6">


                            </div>
                        </div>

                        <button type="submit" class="btn btn-light">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</div>


<?php } ?>
</body>

</html>
