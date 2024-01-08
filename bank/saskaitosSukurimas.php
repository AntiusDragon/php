<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ./index.php');
    die;
}

$saskaitosNr = $_POST['saskaitosNr'];
$vartotojoNr = $_SESSION['userId'];

$sukurtosSaskaitos = json_decode(file_get_contents(__DIR__ . '/data/saskaitos.json'), true);
        
// $bankoSaskaita1 = '';
// $bankoSaskaita2 = '';
$bankoSaskaita3 = '';
$bankoSaskaita4 = '';
$bankoSaskaita5 = '';
$bankoSaskaita11 = 1;
for ($i=0; $i < $bankoSaskaita11; $i++) { 
    // $bankoSaskaita6 = rand(10, 99);
    // $bankoSaskaita7 = rand(1000, 9999);
    $bankoSaskaita8 = rand(1000, 9999);
    $bankoSaskaita9 = rand(1000, 9999);
    $bankoSaskaita10 = rand(1000, 9999);
    foreach ($sukurtosSaskaitos as $sukurtaSaskaita) {
        // $bankoSaskaita1 = $bankoSaskaita6;
        // $bankoSaskaita2 = $bankoSaskaita7;
        $bankoSaskaita3 = $bankoSaskaita8;
        $bankoSaskaita4 = $bankoSaskaita9;
        $bankoSaskaita5 = $bankoSaskaita10;
        if ("LT242024$bankoSaskaita3$bankoSaskaita4$bankoSaskaita5" == $sukurtaSaskaita['saskaita']) {
            $bankoSaskaita11 = $i + 1;
        }
    }
}

$sukurtaSaskaita = [
    'userId' => $vartotojoNr,
    "delete" => false,
    'saskaita' => "LT242024$bankoSaskaita3$bankoSaskaita4$bankoSaskaita5",
    'saskaitosLikutis' => 0,
    'rezervuota' => 0,
    'disponuojamasLikutis' => 0,
    'valiuta' => 'Eur',
];

$sukurtosSaskaitos[] = $sukurtaSaskaita;
file_put_contents(__DIR__."/data/saskaitos.json", json_encode($sukurtosSaskaitos, JSON_PRETTY_PRINT));

header('Location: ./admin.php');
$_SESSION['allOk'] = "Sąskaita <b>LT242024$bankoSaskaita3$bankoSaskaita4$bankoSaskaita5<b> buvo sukurta.";
exit;