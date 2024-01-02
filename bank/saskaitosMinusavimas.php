<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ./index.php');
    die;
}

$sakiatosMinSum = $_POST['saskaitosMin'];
$saskaitosNr = $_POST['saskaitosNr'];
$vartotojoNr = $_SESSION['userId'];

// print_r($_SESSION);

$data = json_decode(file_get_contents(__DIR__ . "/data/saskaitos.json"));

// print_r($data);

foreach ($data as $info) {
    if ($info->saskaita == $saskaitosNr) {
        $info->saskaitosLikutis -= ($sakiatosMinSum * 100);
    }
}
// echo '<br>';
// print_r($data);
$data = json_encode($data, JSON_PRETTY_PRINT);
file_put_contents(__DIR__ . "/data/saskaitos.json", $data);

header('Location: ./admin.php');
exit;