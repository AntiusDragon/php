<?php
// Sukurti puslapį su juodu fonu ir su dviem linkais (nuorodom) į save. 
// Viena nuoroda su failo vardu, o kita nuoroda su failo vardu ir GET duomenų  perdavimo metodu perduodamu kintamuoju color=1. 
// Padaryti taip, kad paspaudus ant nuorodos su perduodamu kintamuoju fonas nusidažytų raudonai, 
// o paspaudus ant nuorodos be perduodamo kintamojo, vėl pasidarytų juodas.

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background:
        <?php if (isset($_GET['color'])) {
            echo 'red';
        } else {
            echo '#000; color: #0b0';
        }
        ?>">
    <h1>7. WEB mechanika (background edition)</h1>
    <a href="http://localhost/php/nd/03/01.php/">Home</a>
    
    <h1><?php print_r($_GET) ?></h1>
    <a href="http://localhost/php/nd/03/01.php/?color=1">Color RED</a>

</body>
</html>