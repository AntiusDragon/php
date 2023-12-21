<?php
session_start();

$_SESSION['mano_sesija'] = 'skanus sesijas';
$_SESSION['logged'] = 'yes sesijas';

$_SESSION['log_time'] = time();

setcookie('mano_saldainis', 'skanus');
// setcookie('mano_saldainis2', 'skanus2', time() + 36000);
// setcookie('mano_saldainis2', 'skanus2', time() - 36000);



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