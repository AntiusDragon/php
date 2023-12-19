<?php
echo '<pre>';
$animals = require __DIR__ . '/animals.php';

$animals[301] = 'Good' . $animals[1];

// print_r($animals);

//pagamina json faila
$json = json_encode($animals, JSON_PRETTY_PRINT); // JSON_PRETTY_PRINT (padaro stulpeliais)
$ser = serialize($animals); // ser

file_put_contents(__DIR__ . '/animals.json', $json);
file_put_contents(__DIR__ . '/animals.ser', $ser); // ser


$getJson = file_get_contents(__DIR__ . '/animals.json');
$getSer = file_get_contents(__DIR__ . '/animals.ser'); // ser

$data = json_decode($getJson, true);
$data = unserialize($getSer); // ser

foreach ($data as $animal) {
    echo $animal . '<br>';
}

echo '<pre>';



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
            color: #0c0;
        }
    </style>
</head>
<body>
</body>
</html>