<?php

require __DIR__ . '/Tv.php';

$tv1 = new Tv('Samsung', 'Petras');
$tv2 = new Tv('LG', 'Bebras');
$tv3 = new Tv('Sony', 'Ona');

$naujiKanalai = ['MTV', 'CNN', 'Discovery', 'Cartton Network'];

$tv1->perjungtiPrograma(1);
$tv2->perjungtiPrograma(2);
$tv3->perjungtiPrograma(3);

// $tv1->kanalai = $naujiKanalai;
// $tv2->kanalai = $naujiKanalai;
// Tv::$kanalai = $naujiKanalai;
Tv::kaistiKanalus($naujiKanalai);

$tv4 = new TV('Panasonic', 'Jonas');

$tv1->perjungtiPrograma(1);
$tv2->perjungtiPrograma(2);
$tv3->perjungtiPrograma(3);
$tv4->perjungtiPrograma(3);

$tv2->hack('Ona');

$tv1->kaRodo();
$tv2->kaRodo();
$tv3->kaRodo();