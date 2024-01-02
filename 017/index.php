<?php

require __DIR__ . '/Nso.php';

$nso1 = new Nso(1, 'green');

$nso2 = $nso1; // by rejerence

$nso3 = new Nso(3);

echo  '<pre>';

// $nso1->__construct(55);

$nso1->changelColor('blue');

echo $nso1->speed . '<br>'; 

$nso1->speed =  'slow';

echo $nso1->speed . '<br>';

$nso1->goFly();
// $nso2->goSwim();

// echo $nso1->color . '<br>';
// echo $nso1->$weight . '<br>';


// var_dump($nso1);
// var_dump($nso2);
// var_dump($nso3);
print_r($nso1);
print_r($nso2);
print_r($nso3);