<?php

$mas4x4 = [
    [1, 2, 3, 4],
    [7, 8, 6, 4],
    [7, 8, 1, 4],
    [7, 8, 1, 4],
];

foreach ($mas4x4 as $row) {
    foreach ($row as $cell) {
            echo $cell . ' ';
    }
    echo '<br>';
}

echo '<br>';
foreach ($mas4x4 as $key => $columbn) {
    foreach ($mas4x4 as $row) {
//         if (is_array($cell)) {
//             foreach ($cell as $value) {
//                 echo $value. ' ';
//             }
//         } else {
        echo $row[$key] . ' ';
    }
}

echo '<br>';

$arrayFancy = [
    [5, 8, 8],
    [8 , [1, 2, 3], 8],
    [8, 8, [1, 2, 3]],
];
echo '<pre>';
// print_r($arrayFancy);

foreach ($arrayFancy as $row) {
    foreach ($row as $cell) {
        if (is_array($cell)) {
            foreach ($cell as $value) {
                echo $value. ' ';
            }
        } else {
            echo $cell  . ' ';
        }
    }
    echo '<br>';
}

echo '<br><br>';


$str = 'Kaip skelbiama Policijos departamento įvykių suvestinėje, 14 val. 17 min. pranešta, kad Baraškių kaime agresyvi 50-ies metų moteris kastuvu užpuolė ir sužalojo jai padėti atvykusius medikus. Atvykusius pareigūnus moteris puolė su peiliu, ją bandyti neutralizuoti dujomis, keturiais elektros impulsinio prietaiso „Taser“ šūviais. Galiausiai policininkas priėmė sprendimą gintis pistoletu, skelbiama, kad pirmiausia šūvius iš „Glock 19“ jis paleido į kojas, po to į rankas, tačiau ir tai moters nesustabdė, paskutinė, mirtina kulka, pataikė į pilvą. Iš viso šauta 5 kartus. Tačiau išties policijos pagalba čia kviesta gerokai anksčiau nei skelbiama suvestinėje. Bendrojo pagalbos centro duomenimis, pirmą kartą jiems skambinta 12 val. 13 min. Pranešėjas paaiškino, kad jo mama serga sunkia psichikos liga ir jos būklė paūmėjo, ji tapo agresyvi, todėl reikia pareigūnų ir medikų pagalbos. '; 
// preg_match_all($re, $str, $matches); // isfiltruoja visus skaicius kurie yra salie vienas kito
// preg_match_all('/\d(\d)/m', $str, $matches); // isfiltruoja visus dvizenklio skaiciaus pakurini skaiciu
// preg_match_all('/(\d)(\d)/m', $str, $matches); // isfiltruoja visus dvizenklio skaiciaus pirmaji ir antraji skaiciu
// preg_match('/(\d)(\d)/m', $str, $matches); // isfiltruoja pirmaji dvizenklio skaiciaus pirmaji ir antraji skaiciu
$what = preg_match('/(\d)a(\d)/m', $str, $matches); // isfiltruoja pirmaji dvizenklio skaiciaus pirmaji ir antraji skaiciu

// $re = '/\d+/m'; // isfiltruoja visus skaicius kurie yra salie vienas kito
// $re = '/\d(\d)/m'; // isfiltruoja visus dvizenklio skaiciaus pakurini skaiciu
// $re = '/(\d)(\d)/m'; // isfiltruoja visus dvizenklio skaiciaus pirmaji skaiciu

print_r($matches);
var_dump($what);

// file_put_contents()