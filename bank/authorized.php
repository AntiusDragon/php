<?php
session_start();
$bankoSaskaitosSukurimas = file_get_contents(__DIR__.'/data/saskaitos/'.$_SESSION['bankoSaskaita'].'.txt');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorized</title>
    <link rel="stylesheet" href="./css/styleAuthorized.css">
</head>
<body>

    <header>
        <h1>Miau-bank</h1>
        <form class="meliuList" action="logout.php" method="post">
            <div><?= $_SESSION['firstName'].' '.$_SESSION['lastName'] ?></div>
            <button class="logout" type="submit">Logout</button>
        </form>
    </header>

    <main class="main">
        <div class="migtukuSarasas">
            List...
        </div>
        <div class="pagrindinisLaukas" style="overflow-y: auto;">
            <div class="saskaitosLesai">
                <div>
                    <p style="font-size: 1.5rem;">Banko sąskaitos</p>
                    <p>Iš viso disponuojamų lėšų</p>
                    <p style="font-size: 2rem;"><?= $bankoSaskaitosSukurimas / 100 ?> eur</p>
                </div>
                <button class="naujasMjolejimas">Naujas mokėjimas</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Banko sąskaita</th>
                        <th>Sąskaitos likutis</th>
                        <th>Rezervuota</th>
                        <th>Disponuojamas likutis</th>
                        <th>Valiuta</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div style="white-space: normal; text-align: left;">
                                <span><?= $_SESSION['lastName'].' '.$_SESSION['firstName'] ?> Banko sąskaita</span>
                                <span><?= $_SESSION['bankoSaskaita'] ?></span>
                            </div>
                        </td>
                        <td><?= $bankoSaskaitosSukurimas / 100 ?></td>
                        <td> </td>
                        <td><?= $bankoSaskaitosSukurimas / 100 ?></td>
                        <td>Eur</td>
                    </tr>
                    <tr>
                        <td>
                            <div style="white-space: normal; text-align: left;">
                                <span><?= $_SESSION['lastName'].' '.$_SESSION['firstName'] ?> Banko sąskaita</span>
                                <span><?= $_SESSION['bankoSaskaita'] ?></span>
                            </div>
                        </td>
                        <td><?= $bankoSaskaitosSukurimas / 100 ?></td>
                        <td> </td>
                        <td><?= $bankoSaskaitosSukurimas / 100 ?></td>
                        <td>Eur</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- <h3>PresonalCode: <?= $_SESSION['presonalCode'] ?></h3> -->
        <!-- <h3>Phone: <?= $_SESSION['phone'] ?></h3> -->
        <!-- <h3>Email: <?= $_SESSION['email'] ?></h3> -->

        <!-- <a href="index.php">Go to main page</a> -->
    </main>

</body>
</html>