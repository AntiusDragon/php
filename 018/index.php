<?php

require __DIR__ . '/Afrika.php';
require __DIR__ . '/ManoAfrika.php';
require __DIR__ . '/Dramblys.php';
require __DIR__ . '/Krokodilas.php';

$dramblys = new Dramblys;
$krokodilas = new Krokodilas;

// echo '<pre>';
// var_dump($dramblys);

echo $dramblys->pavadinimas . '<br>';
echo $dramblys->spalva . '<br>';
echo $dramblys->zemynas . '<br>';
echo $dramblys->gyventojai . '<br>';
echo $dramblys->socialinisTinklas . '<br>';
echo $dramblys->padainuok() . '<br><br>';

echo $krokodilas->pavadinimas . '<br>';
echo $krokodilas->spalva . '<br>';
echo $krokodilas->zemynas . '<br>';
echo $krokodilas->gyventojai . '<br>';
echo $krokodilas->socialinisTinklas . '<br>';
echo $krokodilas->padainuok() . '<br><br>';