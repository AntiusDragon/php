<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ./index.php');
    die;
}

$saskaitosNr = $_POST['saskaitosNr'];
$vartotojoNr = $_SESSION['userId'];

// print_r($_SESSION);

$data = json_decode(file_get_contents(__DIR__ . "/data/saskaitos.json"));

// print_r($data);

foreach ($data as $info) {
    if ($info->saskaita == $saskaitosNr ) {
        if ($info->saskaitosLikutis == 0) {
            $info->delete = true;
        } else {
            header('Location: ./admin.php');
            $_SESSION['error'] = "Sąskaitos negalima trinti nes yra likutis " . number_format($info->saskaitosLikutis / 100, 2) . " $info->valiuta.";
            die;
        }
    }
}
// echo '<br>';
// print_r($data);
$data = json_encode($data, JSON_PRETTY_PRINT);
file_put_contents(__DIR__ . "/data/saskaitos.json", $data);

header('Location: ./admin.php');
$_SESSION['allOk'] = "Sąskaita $saskaitosNr buvo panaikinta.";
exit;