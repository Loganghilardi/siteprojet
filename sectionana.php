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
                border-radius: 0;
            }




            button {


                margin-top: 2px;
                margin-right: 1px;
            }

            input {
                border-radius: 0;
            }

        </style>
                <link rel="stylesheet" href="css.css" type="text/css" >
    </head>

<body style="background-color: #f0f0f0;">

<div class="container" style="background-color: white;">
<div class="row">


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

     $reponse = $bdd->query('SELECT * FROM motif');

          ?>


    <form action="sectionana.php" method="post" class="col-lg-2">
        <div class="form-group">
            <label for="code">Motif</label>
            <select class="form-control" name="code">
                <option selected>60 ANNIVER</option>
                <option>ASSOC CENT</option>
                <option>COMM052</option>
                <option>CROSS</option>
                <option>DST</option>
            </select>
            <button class="btn btn-light" type="submit"> Valider</button>
            <button class="btn btn-light" onclick="printDiv('printableArea')" value="print a div!">Imprimer
            </button>
        </div>


    </form>
    </div>
    <div class="row">
        <div id="printableArea">
            <div class="container" style="text-align: center">

                <?php
             if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    while ($donnees = $reponse->fetch()) {
                      if ($_POST['code'] === $donnees['code'] ){ ?>
                <h3 > Motif : <?php echo $donnees['code'];?></h3>
                 <h4> <?php echo $donnees['libelle']; ?> </h4>
                  <h4 > Direction : <?php echo $donnees['direction'];?></h4>
                  <h4 > Service : <?php echo $donnees['service'];?></h4>


                  <?php } }}?>
            </div>


        </div>
        <script>
            window.printDiv = function (divName) {

                const printContents = document.getElementById(divName).innerHTML;
                const originalContents = document.body.innerHTML;


                document.body.innerHTML = printContents;


                window.print();

                document.body.innerHTML = originalContents;
 }
 </script>

    </body>
    </html>
<?php } ?>