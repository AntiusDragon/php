<?php
require __DIR__ . '/Cart.php';

$cart1 = Cart::getCart(88);
$cart2 = unserialize(serialize($cart1));
// $cart2 = clone $cart1;
// $cart2 = Cart::getCart(89);

echo '<pre>';

var_dump($cart1);
var_dump($cart2);