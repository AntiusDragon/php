<?php

require __DIR__ . '/Stikline.php';

$stikline1 = new Stikline(200);
$stikline2 = new Stikline(150);
$stikline3 = new Stikline(100);

// $stikline1->ipilti(200);
// $stikline2->ipilti($stikline1->ipilti(200)->ispilti());
$stikline3->ipilti($stikline2->ipilti($stikline1->ipilti(200)->ispilti())->ispilti());

echo '<pre>';
print_r($stikline1);
print_r($stikline2);
print_r($stikline3);