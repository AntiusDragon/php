<?php
// Sukurkite 4 kintamuosius, kurie saugotų jūsų vardą, pavardę, gimimo metus ir šiuos metus (nebūtinai tikrus). 
// Parašykite kodą, kuris pagal gimimo metus paskaičiuotų jūsų amžių ir naudodamas vardo ir pavardės kintamuosius atspausdintų tokį sakinį :
// "Aš esu Vardenis Pavardenis. Man yra XX metai(ų)".

echo '<pre>';
$vartotojai = require __DIR__ . '/01-1.php';

foreach ($vartotojai as $vartotojas) {
    print_r('Aš esu '
        . $vartotojas['vardas'] 
        . ' ' 
        . $vartotojas['pavarde'] 
        . ' Man yra ' 
        . 2023 - $vartotojas['metai'] 
        . ' metai(ų)<br><br>');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #000;
            color: #0b0;
        }
    </style>
</head>
<body>
    
</body>
</html>