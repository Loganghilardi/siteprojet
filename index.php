<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Relève et détachements</title>
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

    </style>
</head>

<body style="background-color: #f0f0f0;">
<div class="container" style="background: white">
    <?php include 'menu.php' ?>

    <?php
    /* si non connecter  */
    if (!isset($_SESSION['pseudo'])) { ?>
    <div class="row" style="background-color: white;border-bottom: 2px solid #cfcfcf;">
        <p class="col-lg-6 col-sm-6 col-xs-12"></p>
        <img class="col-lg-12 col-sm-12 col-xs-12" style="border: 0px solid ; border-radius: 200px;"
             src="https://static.lpnt.fr/images/2011/12/08/ratp-454337-jpg_306102_660x281.JPG">
    </div>
    <div class="row">
        <h1 class="col-lg-12" style="text-align: center;"></h1>
        <?php }
        /* si deja connecter */
        else {

            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="jumbotron col-lg-2"
                         style="background-color: whitesmoke;background-repeat: no-repeat;font-size: 2em;text-align: center;background-size: cover; border: 2px solid #cfcfcf">
                        <?php echo 'Bonjour ' . $_SESSION['pseudo'] ?>
                    </div>
                </div>
                <div class="row">
                    <p>Plop</p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</body>

</html>
