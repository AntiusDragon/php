<?php
session_start();

$notWhite = '#222';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cb = $_POST['cb'] ?? [];

    // echo '<pre>';
    // print_r($cb);
    // die;
    $count = count($cb);

    header('Location: http://localhost/php/013/u9ws.php?count='. $count);
    die;
    
    // foreach ($cb as $letter) {
    //     $color = 'black';
    //     echo $letter;
    // }
}
    
if (isset($_GET['count'])) {
    $count = $_GET['count'];
    $color = $notWhite;
} else {
    $color = 'black';
    $letters = range('A', 'J');
    $random3_10 = rand(3, 10);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U - 9</title>
</head>
<body style="background-color:<?= $color ?>; color: #0b0">

<?php if ($color == $notWhite): ?>
    <h1 style="colot: skyblue;">
        You have selected <?= $count ?> letters
    </h1>
    <a href="http://localhost/php/013/u9ws.php">BLACK</a>
    <?php else: ?>

    <form action="" method="post">
        <?php foreach (array_slice($letters, 0, $random3_10) as $letter): ?>
            <input type="checkbox" name="cb[]" value="<?= $letter ?>">
            <label style="color: skyblue;">
                <?= $letter ?>
            </label>
        <?php endforeach ?>
        <button type="submit">POST IT</button>
    </form>

<?php endif ?>
</body>
</html>