<?php

$farm = [
    [
        'name' => 'Cow',
        'sound' => 'Moo',
        'price' => 1000,
        'weight' => [500, 600, 700],
    ],
    [
        'name' => 'Pig',
        'sound' => 'Oink',
        'price' => 500,
        'weight' => [100, 200, 300],
    ],
    [
        'name' => 'Chicken',
        'sound' => 'Cluck',
        'price' => 250,
        'weight' => [1, 2, 3],
    ],
    [
        'name' => 'Horse',
        'sound' => 'Neigh',
        'price' => 5000,
        'weight' => [800, 900, 1000],
    ],
    [
        'name' => 'Sheep',
        'sound' => 'Baa',
        'price' => 750,
        'weight' => [200, 300, 400],
    ],
];


echo '<pre>';
print_r($farm);

print_r('----- -----');
function sortBySound($a, $b) {
    return $a['sound'] <=> $b['sound'];
};
// usort($farm, 'sortBySound');

$sortByName = function($a, $b) {
    return $a['name'] <=> $b['name'];
};
usort($farm, $sortByName);

// usort($farm, fn($a, $b) => $a['price'] <=> $b['price']);
// usort($farm, fn($a, $b) => $b['price'] <=> $a['price']);
// usort($farm, fn($a, $b) => $b['name'] <=> $a['name']);


// sort by second weight
usort($farm, function($a, $b) {
    return $a['weight'][1] <=> $b['weight'][1];
});

print_r($farm);



print_r('----- ----- -----');
$persons = [
    [
        'name' => 'Paul',
        'wife' => 'Jane',
    ],
    [
        'name' => 'Peter',
        'wife' => 'Mary',
    ],
    [
        'name' => 'Paul',
        'wife' => 'Sue',
    ],
    [
        'name' => 'Mark',
        'wife' => 'Kate',
    ],
    [
        'name' => 'Paul',
        'wife' => 'Anne',
    ],
];

// sort by name and wife
usort($persons, function($a, $b) {
    if ($a['name'] == $b['name']) {
        return $a['wife'] <=> $b['wife'];
    }
    return $a['name'] <=> $b['name'];
});

echo '<pre>';
print_r($persons);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #000;
            color: #0c0;
        }
    </style>
</head>
<body>
</body>
</html>