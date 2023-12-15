<?php

echo '<br>----------<br>';
function noReturn() :void { // nieko negrazina
    echo 'I have no return value.<br>';
}

$noReturnValue = noReturn();
var_dump($noReturnValue);

echo '<br><br>';
function returnInt() :int|string { // grazina
    return 1;
}

$returnIntValue = returnInt();
var_dump($returnIntValue);

$canIseeIt = 'Yes, you can see me!';

function tryToSeeMe() {
    // Per nagus uz global naudojima
    global $canIseeIt, $imInFunction;

    $imInFunction ='I am in function, you can not  see me!';
    return $canIseeIt;
}

echo '<br><br>';
$tryToSeeMeValue = tryToSeeMe ();
var_dump($tryToSeeMeValue, '<br>');
var_dump($imInFunction);


function sum(int $a, int $b) :int {
    return $a + $b;
}

echo '<br>';
$sumResult = sum(-8, 2);

echo '<br>';
var_dump($sumResult);
echo '<br>';
var_dump(5 == '5');


echo '<br>----------<br>';
function sumAll($a, ...$numbers) :int {
    $sum =  0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    return $sum;
}

echo '<br>';
$sumAllResult = sumAll(1, 2, 3, 4, 7, 8, 9, 10);
$myDigits = [7, 7, 7];

var_dump($sumAllResult);
echo '<br>';
var_dump(sumAll(...$myDigits));


echo '<br>----------<br>';
function withStatic() {
    static $static = 0; // only once
    $static++;
    echo $static . '<br>';
}

withStatic();
withStatic();
withStatic();
withStatic();


echo '----------<br>';
// Po pietu
function withRecursive($a) {
    if ($a <= 3) {
        echo 'IN:' . $a . '<br>';
        withRecursive($a + 1);
    }
    echo 'OUT:' . $a . '<br>';
}

withRecursive(1);


echo '----------<br>';
$arrayFancy = [
    [5, [8, [1, [8, [8, [1, 2, [8, [1, 2, 3], 8]], 8], [1, [8, [1, 2, 3], 8], 3]], 3], 8], 8],
    [8, [1, 2, [8, [1, 2, 3], 8]], 8],
    [[8, [1, 2, 3], 8], 8, [1, 2, 3]],
];
echo '<pre>';
// print_r($arrayFancy);

echo '<pre>';
// count sum of all numbers in array
function sumArray($array) :int {
    $sum = 0;
    foreach ($array as $value) {
        if (is_array($value)) {
            $sum += sumArray($value);
        } else {
            $sum += $value;
        }
    }
    return $sum;
}

echo '<br>';
echo 'Sum: ', sumArray($arrayFancy);


// echo '<br>';
// // echo sum of;
// echo '<br><br>';


echo '<br>----------<br>';
$anonymous = function() {
    echo 'I am anonymous function!<br>';
    return function() {
        echo 'I am anonymous function inside anonjymous function!<br>';
    };
};

$anonymous()();


echo '<br>----------<br>';
function withCallback($callback) {
    echo 'I am in function with callback!<br>';
    $callback();
}

// $cb = function() {
//     echo 'I am callback!<br>';
// };
// withCallback($cb);

$abc = 123;
withCallback(function() use ($abc) {
    echo 'I am anonymous fgunction inside function with callback! -' . $abc . '<br>';
    echo $abc;
});


echo '<br>----------<br>';
$k1 = 1;
$a1 = function() use (&$k1) {
    echo 'I am anonymous function ' . $k1 . '!<br>';
};

$k1++;
$a1();


echo '<br>----------<br>';
$arrow = fn() => 'I am arrow function!' . $k1 . '<br>';
echo $arrow();

echo '<br><br>';
$farm = [
    [
        'name' => 'Cow',
        'sound' => 'Muuuu',
        'weight' => 500,
    ],
    [
        'name' => 'Pig',
        'sound' => 'Kra kra',
        'weight' => 100,
    ],
    [
        'name' => 'Chicken',
        'sound' => 'Cip cip',
        'weight' => 1,
    ],
    [
        'name' => 'Horse',
        'sound' => 'Iiiiiii',
        'weight' => 800,
    ],
    [
        'name' => 'Sheep',
        'sound' => 'Beeeee',
        'weight' => 200,
    ],
];

$weightPlus1 = array_map(function($animal) {
    $animal['weight'] += 1;
    return $animal;
}, $farm);

// $weightPlus1 = array_map(fn($animal) =>['name' => $animal['name'], 'weight' => $anima;['weight'] +1], $
// $weightPlus1 = array_map(fn($animal) => (($animal['weight'] +1) && $snimal), $farm);

array_walk($farm, fn(&$animal) => $animal['weight'] += 1);

print_r($weightPlus1);