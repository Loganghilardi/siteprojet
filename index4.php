<?php session_start(); ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Liste des Utilisateurs par Motif </title>
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

        #tr:hover {
            background: lightgrey;
        }
    </style>
</head>

<body style="background-color: #f0f0f0;">
<div class="container" style="background: white">


    <?php include 'menu.php';

    if (!isset($_SESSION['pseudo'])) {
        echo '<div style="text-align: center;"><span  style="color: red; font-size: medium; "><b>Vous devez vous connecter pour acceder à la page </div></font><br />';
    } else {
        try {
            // On se connecte à MySQL
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
        }


        $reponse = $bdd->query('SELECT * FROM motif ORDER BY code ASC');


        ?>


        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['delete'])) {

                $supp = $_POST['delete'];
                $req = $bdd->prepare("DELETE FROM motif WHERE code = :supp");
                $req->bindParam(':supp', $supp, PDO::PARAM_STR_CHAR);
                $req->execute();
            }
            if (!empty($_POST['code'])) {


                $code = $_POST['code'];
                $libelle = $_POST['libelle'];
                $direction = $_POST['direction'];
                $service = $_POST['service'];


                $req = $bdd->prepare('INSERT INTO motif(code,libelle,direction,service) VALUES (:code, :libelle, :direction, :service) ');
                $req->execute(array(
                    'code' => $code,
                    'libelle' => $libelle,
                    'direction' => $direction,
                    'service' => $service));
            }
            header('refresh: 0');
        }
        ?>
        <?php
        ?>
        <div style="overflow: auto;max-height: 60vh;">
            <table class="table table table-hover " style="background-color: whitesmoke;border: solid 2px #cfcfcf ">
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


                while ($donnees = $reponse->fetch()) {


                    ?>
                    <tr id="tr">
                        <td onclick="yolo(this);"><?php echo $donnees['code'];

                            ?></td>
                        <td><?php echo $donnees['libelle']; ?></td>
                        <td><?php echo $donnees['direction']; ?></td>
                        <td><?php echo $donnees['service'];
                            ?></td>
                    </tr>

                <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12" style="margin: 1vh;">
            <div class="btn-group" role="group" aria-label="exemple">
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">Ajouter
                </button>
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#suppmodal  ">
                    Supprimer
                </button>
            </div>
        </div>
        <div class="col-lg-12" id="ta" style="overflow: auto;max-height: 60vh;">

        </div>

        <script>


            function yolo(form_element) {


                var form_element_id = form_element.innerHTML;
                var code = form_element_id;


                if (form_element_id === code) {

                    var body = document.getElementById("ta");
                    body.innerHTML = '';

                    // creates a <table> element and a <tbody> element
                    var tbl = document.createElement("table");
                    tbl.classList.add("table");
                    tbl.classList.add("table");
                    tbl.classList.add("table-hover");
                    tbl.style.backgroundColor = 'whitesmoke';
                    tbl.style.border = "solid 2px #cfcfcf"
                    var tblBody = document.createElement("tbody");

                    // creating all cells
                    for (var i = 1; i < 4; i++) {
                        // creates a table row
                        var row = document.createElement("tr");


                        for (var j = 1; j < 4; j++) {
                            // Create a <td> element and a text node, make the text
                            // node the contents of the <td>, and put the <td> at
                            // the end of the table row
                            var cell = document.createElement("td");
                            var cellText = document.createTextNode("cellule de la ligne " + i + ", colonne " + j + form_element_id);
                            cell.appendChild(cellText);
                            row.appendChild(cell);
                        }

                        // add the row to the end of the table body
                        tblBody.appendChild(row);
                    }

                    // put the <tbody> in the <table>
                    tbl.appendChild(tblBody);
                    // appends <table> into <body>
                    body.appendChild(tbl);
                    // sets the border attribute of tbl to 2;


                    form_element.innerHTML = '7';

                    alert("Le motif ayant le code  `" + form_element_id + "` à été cliqué !");
                } else {
                    console.log("lol");
                }


            }
        </script>

    <?php } ?>

    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="index4.php">
                        <label>Code
                            <input type="text" name="code" class="form-control">
                        </label>
                        <label>Libellé
                            <input type="text" name="libelle" class="form-control">
                        </label>
                        <label>Direction
                            <input type="text" name="direction" class="form-control">
                        </label>
                        <label>Secteur
                            <input type="text" name="service" class="form-control">
                        </label>

                        <button type="submit" class="btn btn-light">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="suppmodal" role="dialog"
         tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="index4.php">
                        <label>
                            <input type="text" class="form-control" name="delete" placeholder="Année à supprimer">
                        </label>
                        <button type="submit" class="btn btn-light">Supprimer une ligne</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
