<?php

$bankoSaskaita1 = '';
$bankoSaskaita2 = '';
$bankoSaskaita3 = '';
$bankoSaskaita4 = '';
$bankoSaskaita5 = '';
$bankoSaskaita11 = 1;
for ($i=0; $i < $bankoSaskaita11; $i++) { 
    $bankoSaskaita6 = rand(10, 99);
    $bankoSaskaita7 = rand(1000, 9999);
    $bankoSaskaita8 = rand(1000, 9999);
    $bankoSaskaita9 = rand(1000, 9999);
    $bankoSaskaita10 = rand(1000, 9999);
    foreach ($users as $user) {
        $bankoSaskaita1 = $bankoSaskaita6;
        $bankoSaskaita2 = $bankoSaskaita7;
        $bankoSaskaita3 = $bankoSaskaita8;
        $bankoSaskaita4 = $bankoSaskaita9;
        $bankoSaskaita5 = $bankoSaskaita10;
        if ("LT$bankoSaskaita1$bankoSaskaita2$bankoSaskaita3$bankoSaskaita4$bankoSaskaita5" == $user['bankoSaskaita']) {
            $bankoSaskaita11 = $i + 1;
        }
    }
}