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

if (0 > $sakiatosMinSum) {
    header('Location: ./admin.php');
    $_SESSION['error'] =  'Klaida.';
    die;
}
foreach ($data as $info) {
    if ($info->saskaita == $saskaitosNr) {
        if ($info->saskaitosLikutis < $sakiatosMinSum * 100) {
            header('Location: ./admin.php');
            $_SESSION['error'] =  'Sąskaitoje nėra tokios sumos.';
            die;
        } else {
            $info->saskaitosLikutis -= ($sakiatosMinSum * 100);
        }
    }
}
// echo '<br>';
// print_r($data);
$data = json_encode($data, JSON_PRETTY_PRINT);
file_put_contents(__DIR__ . "/data/saskaitos.json", $data);

header('Location: ./admin.php');
$_SESSION['allOk'] = "Sąskaita $saskaitosNr buvo minusota $sakiatosMinSum eur.";
exit;