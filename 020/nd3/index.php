<?php

require __DIR__ . '/Kibiras2.php';

$kibira1 = new Kibiras2;
$kibira2 = new Kibiras2;
$kibira3 = new Kibiras2;

$kibira1->prideti1Akmeni();
$kibira1->pridetiDaugAkmenu(5);
$kibira2->pridetiDaugAkmenu(10);
$kibira3->pridetiDaugAkmenu(15);

echo '<pre>';
var_dump($kibira1);
var_dump($kibira2);
var_dump($kibira3);

echo $kibira1->kiekPririnktaAkmenu();
echo '<br>';
echo $kibira2->kiekPririnktaAkmenu();
echo '<br>';
echo $kibira3->kiekPririnktaAkmenu();
echo '<br>';

echo '<br><br>';

echo $kibira1->kiekVisoPririnktaAkmenu();
echo '<br>';
echo $kibira2->kiekVisoPririnktaAkmenu();
echo '<br>';
echo $kibira3->kiekVisoPririnktaAkmenu();
echo '<br>';

