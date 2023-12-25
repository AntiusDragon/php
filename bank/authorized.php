<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorized</title>
    <link rel="stylesheet" href="./css/styleHome.css">
</head>
<body>

    <main class="main">
        <h1>Miau-bank</h1>
        <h2>Hello <?= $_SESSION['firstName'].' '.$_SESSION['lastName'] ?></h2>
        <h3>PresonalCode: <?= $_SESSION['presonalCode'] ?></h3>
        <h3>Phone: <?= $_SESSION['phone'] ?></h3>
        <h3>Email: <?= $_SESSION['email'] ?></h3>

        <a href="index.php">Go to main page</a>
        <form action="logout.php" method="post">
            <button type="submit">Logout</button>
        </form>
    </main>

</body>
</html>