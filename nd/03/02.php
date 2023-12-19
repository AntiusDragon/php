<?php
// Sukurti puslapį panašų į 1 uždavinį, tiktai antro linko su perduodamu kintamuoju nedarykite, o vietoj to padarykite, 
// URL eilutėje ranka įvedus GET kintamąjį color su RGB spalvos kodu (pvz color=ff1234) puslapio fono spalva pasidarytų tokios spalvos.

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background:
        <?php 
        if (isset($_GET['color'])) {
            echo $_GET['color'];
        } else {
            echo '#000; color: #0b0';
        }
        ?>">
    <h1>7. WEB mechanika (background edition)</h1>
    <h1><?php print_r($_GET) ?></h1>
    <a href="http://localhost/php/nd/03/02.php">Home</a>
    

    <form action="http://localhost/php/nd/03/02.php" method="get">
        <input type="color" name="color">
        <button type="submit">GET IT</button>
    </form>
</body>
</html>