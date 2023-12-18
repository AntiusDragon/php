<?php

define('MY_CONST', 'My constant value');

define('small', 'small value'); // not recommend

define('MY_ARRAY', [
    'key' => 'value',
    'key2' => 'value2',
]);

// array_push(MY_ARRAY, 'value3'); // negalima

echo MY_CONST;
echo '<br>';
echo small;
echo '<br>';
echo MY_ARRAY['key'];

echo('<br>------ ------ ------ ------<br>');

function myFunction() {
    echo MY_CONST;
    echo '<br>';
    echo small;
    echo '<br>';
    echo MY_ARRAY['key'];
}

myFunction();

echo('<br>------ ------ ------ ------<br>');
// php predefined constants
echo PHP_INT_MIN;

echo('<br>------ ------ ------ ------<br>');
echo __DIR__ . '\test1.txt';

echo('<br>------ ------ ------ ------<br>');
file_put_contents(__DIR__ . '/test1.txt', 'text1');  // absolitus path, saugesnis varijantas
file_put_contents('/test2.txt', 'text2'); // relative path

// always use absolute path






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