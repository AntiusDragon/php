<?php
echo '<pre>';
$animals = require __DIR__ . '/animals.php';

$animals[1] = 'Good' . $animals[1];

// print_r($animals);

//pagamina json faila
$json = json_encode($animals, JSON_PRETTY_PRINT);
file_put_contents(__DIR__ . '/animals.json', $json);

$getJson = file_get_contents(__DIR__ . '/animals.json');

$data = json_decode($getJson);

foreach ($data as $animal) {
    echo $animal . '<br>';
}

echo '<pre>';

