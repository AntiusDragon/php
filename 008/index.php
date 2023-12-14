<?php

$jonas = rand(5, 25);
$petras = rand(10, 20);

echo "Jona: $jonas Petras: $petras <br>";

if ($jonas > $petras) {
    echo 'Laimejo Jonas';
} else if ($jonas < $petras) {
    echo 'Laimejo Petras';
} else {
    echo 'Lygiosios';
}

echo '<br><br>';
$vienas = 12;
$rezultatas = 1 == $vienas ? '1' : (2 == $vienas ? 'No' : 'DoNotKnow');
echo $rezultatas;

echo '<br><br>';
$kas = null;
var_dump(isset($kas));

echo '<br><br>';
var_dump($kas === null);

echo '<br><br>';
for ($k = 1; $k <= 15; $k++) {
    echo "didelis: $k<br>";
    for ($i = 1; $i <= 15; $i++) {
        $random = rand(0, 10);
        if ($random > 9) {
            break 2;
        }
        echo "mazas: $i, random: $random<br>";
    }
    echo 'Ciklo pabaiga<br><br>';
}

echo '<br><br>';
for ($i = 1; $i <= 7 ; $i++) { 
    switch ($i) {
        case 1:
            echo 'Vienas';
            break;
        case 2:
            echo 'Du';
            break;
        case 3:
            echo 'Tris';
            break;
        case 4:
            echo 'Keturi';
            break;
        case 5:
            echo 'Penki';
            break;
        default:
            echo 'Nera';
            break;
    }
}

$skaicius = match (true) {
    $k > 5 => 'Daugiau nei penki',
    default => 'maziau nei 5',
};

echo $skaicius;