<?php

// POST - duomenys ateina is formos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kas = $_POST['kas'] ?? '';
    header('Location: http://localhost/php/012/handle.php/');
    die;

    // echo '<h2>Labas, POST!<h2>';
    // print_r($_POST);

}

// GET
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
    <h1>Hello WEB mechanics!</h1>
    <h2><?php echo $kas ?? 'Nieko nera' ?></h2>

    <form action="http://localhost/php/012/handle.php/" method="post">
        <input type="text" name="kas">
        <button type="submit">POST IT</button>
    </form>

</body>
</html>