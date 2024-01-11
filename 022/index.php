<?php

// spl_autoload_register(function ($class) {
//     // echo "Loading class $class<br> 1 time<br>";
//     require __DIR__ . '/' . $class . '.php';
// });

// spl_autoload_register(function ($class) {
//     echo "Loading class $class<br> 2 time<br>";
//     require_once __DIR__ . '/A.php';
// });

// spl_autoload_register(function ($class) {
//     echo "Loading class $class<br> 3 time<br>";
// });
use Visai\Kitas\Dalykas\A;
use B\Space\B;

require __DIR__ . '/vendor/autoload.php';

$a = new A;
$b = new B;
$c = new C;