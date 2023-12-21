<?php
session_start();

echo $_SESSION['mano_sesija'];
echo '<br>';
echo $_SESSION['logged'];
echo '<br>';

if ($_SESSION['log_time'] < time() - 10) {
    echo 'Sesija baigesi';
}

echo '<br>';
echo $_COOKIE['mano_saldainis'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: #000; color: #0b0">
    
</body>
</html>