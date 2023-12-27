<?php

$boxId = rand(1000000, 9999999);
$amount = $_POST['amount'] ?? 0;

$boxes = json_decode(file_get_contents(__DIR__ . '/data/boxes.json'),true);
$boxes[] = [
    'boxId' => $boxId,
    'amount' => $amount,
];

file_get_contents(__DIR__ . '/data/boxes.json', json_decode($boxes, JSON_PRETTY_PRINT));

header('Location: http://localhost/php/crud/read.php');