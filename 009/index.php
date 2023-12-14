<?php
echo '<pre>';

$arr = ['racoon', 'rabit', 'fox'];
print_r($arr);
// nedariti taip!!!!!!!
// $badArray = array('racoon', 'rabit', 'fox');
// print_r($badArray);

// array is primityvus tipo, todel nera nuorodos, o yra kopija

$arr2 = $arr;
$arr2[0] = 'dog';

array_push($arr, 'cat'); // lame
$arr[] = 'cat'; // cool

array_unshift($arr, 'muose');
array_pop($arr2);
array_shift($arr2); 

$arr[19] = 'cow';
$arr['lauke'] = 'lape';
$arr[''] = 'lape2';
$arr[''] = 'lape3';

array_unshift($arr, 'Cool Cat');
$arr[] = 'cat'; // cool
array_values($arr);

$arr[true] = 'true';
$arr[false] = 'false';
$arr['1'] = '1 stringas';
$arr['1'] = '1 stringas';
$arr['01'] = '01 stringas';
$arr[8.7] = '8.7 stringas';

$arr4 = array_values($arr); // sutvarko numeracija

// print_r($arr2);
// print_r($arr);
// print_r($arr4);

echo '<br>';
// echo count($arr);

echo '<br><br>';

foreach ($arr as $index => &$value) {
    // echo "[$index] => $value<br>";
    // $arr[$index] = 'kate winlet';
    $value = 'kate winslet';
}

echo '<br>';
$A = 5;
$B = &$A;
$A++;
echo $A, ' ', $B;
// print_r($arr);

echo '<br>';
$colors = ['red', 'green', 'blue', 'yellow'];

foreach ($colors as &$color) {}
unset($color); // panaikinam nuoroda i paskutini elementa
foreach ($colors as $color) {}

echo '<br>';
print_r($colors);
echo '<br>';


echo current($colors);

// echo '<br>';
// next($colors);
// next($colors);
// echo current($colors);

// next($colors);
// next($colors);
// next($colors);
// var_dump(current($colors)) . '<br>';

do {
    echo current($colors) . '<br>';
} while (next($colors));


echo '<br>';

for ($i=1; $i < 6; $i++) { 
    echo "$i <br>";
}

foreach (range(1, 5) as $i) {
    echo "$i <br>";
}