<?php
echo('<br>------ ------ ------ ------<br>');

define('OK', true);

echo '<h1>Big INDEX</h1>';

include __DIR__ . '/f1.php';

echo '<h1>Big INDEX middle</h1>';

include __DIR__ . '/f1.php';

// require __DIR__ . '/f2.php';

// if (file_exists(__DIR__ . '/f2.php')) {
//     require __DIR__ . '/f2.php';
// };

require __DIR__ . '/../here.php';

// require is only one realy correct way to include files

echo '<h1>Big INDEX end</h1>';



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