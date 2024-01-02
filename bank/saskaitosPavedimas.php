<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ./index.php');
    die;
}

$sumaEur = $_POST['sumaEur'];
$saskaitosNr = $_POST['saskaitosNr'];
$vartotojoNr = $_SESSION['userId'];
$klientoSaskaita =$_POST['klientoSaskaita'];

if ($sumaEur == '' || $klientoSaskaita == '') {
    header('Location: ./authorized.php');
    $_SESSION['error'] = 'Klaida: negalima palikti tuščių laukelių!';
    exit;
}
if ($saskaitosNr == $klientoSaskaita) {
    header('Location: ./authorized.php');
    $_SESSION['error'] = 'Klaida: sąskaita sutampa su ta, kurią bandėte pervesti!';
    exit;
}

$data = json_decode(file_get_contents(__DIR__ .'/data/saskaitos.json'));

foreach ($data as $info) {
    if ($info->saskaita == $saskaitosNr) {
        if ($sumaEur * 100 > $info->saskaitosLikutis) {
            header('Location: ./authorized.php');
            $_SESSION['error'] = 'Klaida: parodyta didesnė suma nei turite!';
            exit;
        }
    }
}
// print_r($_SESSION);
// print_r($klientoSaskaita);

$klientasGavo = false;
$savininkasMinusavo = false;
foreach ($data as $info) {
    if ($info->saskaita == $klientoSaskaita) {
        $info->saskaitosLikutis += ($sumaEur * 100);
        $klientasGavo = true;
        // echo '<br>';
        // print_r($data);
    }
}

if ($klientasGavo == true) {
    foreach ($data as $info) {
        if ($info->saskaita == $saskaitosNr) {
            $info->saskaitosLikutis -= ($sumaEur * 100);
            $info->saskaitosLikutis += (round($sumaEur, 1) * 10);
            $savininkasMinusavo = true;
        }
    }
} else {
    die;
}
// echo '<br>';
// print_r($data);
if ($klientasGavo == true || $savininkasMinusavo == true) {
    $data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents(__DIR__ . '/data/saskaitos.json', $data);
    header('Location: ./authorized.php');
} else {
    header('Location: ./authorized.php');
    $_SESSION['error'] = 'Sistemos klaida';
    exit;
}