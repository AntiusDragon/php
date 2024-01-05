<?php

require __DIR__ . '/Kibiras1.php';

$kibiras1 = new Kibiras1;
$kibiras2 = new Kibiras1;
$kibiras3 = new Kibiras1;

$kibiras1->prideti1Akmeni();
$kibiras1->pridetiDaugAkmenu(5);
$kibiras1->pridetiDaugAkmenu(15);

$kibiras2->prideti1Akmeni();
$kibiras2->pridetiDaugAkmenu(5);
$kibiras2->prideti1Akmeni();
$kibiras2->prideti1Akmeni();
$kibiras2->pridetiDaugAkmenu(5);

$kibiras3->prideti1Akmeni();
$kibiras3->pridetiDaugAkmenu(5);
$kibiras3->prideti1Akmeni();

echo '<pre>';
echo $kibiras1->kiekPririnktaAkmenu() . '<br><br>';
echo $kibiras2->kiekPririnktaAkmenu() . '<br><br>';
echo $kibiras3->kiekPririnktaAkmenu() . '<br><br>';