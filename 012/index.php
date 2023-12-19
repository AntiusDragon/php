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
    <pre>
    <h1>Hello WEB mechanics!</h1>
    <a href="http://localhost/php/012/?kas=kazkas">Linkas kaskas</a>
    <a href="http://localhost/php/012/?kas=kitas">Linkas kitas</a>
    <a href="http://localhost/php/012/?kas=kitas&kitas=kitasDalykas">Linkas kitas ir kitasDalykas</a>

    <?php
    print_r($_GET); // yra kqueris, (matoma, visiems, kaip voko virsus)

    print_r($_POST); // yra metodas, (matoma, tik asmeniui, kaip voko vidus)

    print_r($_SERVER['REQUEST_METHOD']);


    if (($_GET['kas'] ?? '') == 'kazkas') {
        echo '<h2>Labas, kazkas!</h2>';
    }
    if (($_GET['kas'] ?? '') == 'kitas') {
        echo '<h2>Labas, kitas!</h2>';
    }

    ?>
    <form action="http://localhost/php/012/" method="get">
        <input type="text" name="kas">
        <input type="color" name="kitas">
        <input type="hidden" name="a" value="5">
        <button type="submit">GET IT</button>
    </form>

    <form action="http://localhost/php/012/?z=88" method="post">
        <input type="text" name="kas">
        <input type="color" name="kitas">
        <input type="hidden" name="a" value="5">
        <button type="submit">GET IT</button>
    </form>

    </pre>
</body>
</html>

<?php

// Quwey GET, POST
// Body POST
// Params GET, POST