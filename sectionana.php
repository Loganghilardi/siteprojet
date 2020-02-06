<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" type="image/x-icon" href="Capture.PNG">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div id="unprintableArea">
    <h1>Imprime moi</h1>
</div>
<div id="printableArea">pas oim
</div>
<div onclick="printDiv('printableArea')" value="print a div!">oki
</div>
<script>
    window.printDiv = function (divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }</script>

</body>
</html>
