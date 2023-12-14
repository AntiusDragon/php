<h1>Big</h1>

<?php

echo ('<h1>Labas vakaras</h1>');

$jaja = 25;

?>

<h1>Big</h1>

<?php

echo '<h1>Labas vakaras</h1>';

echo $jaja;

$s1 = 'Labas';
$s2 = 'rytas';

echo $s1 . ' '  . $s2;

// echo $s1 + $s2;

$s3 = "$s1 rytas";
$s4 = '$s1 ryt\'as';

echo $s3;
echo '<br>';
echo $s4;

$a1 = 'a2';

$a2 = 'a3';

$a3 = 'labas';

echo '<br>';

echo $$$a1;
echo $$a2;
echo $a3;

echo '<br>';

print $a3;

echo '<br>';

echo '<pre>';
print_r([$a1, $a2, $a3]);

echo '<br>';
var_dump($a3);