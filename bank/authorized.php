<?php
session_start();
$saskaitosSukurimas = json_decode(file_get_contents(__DIR__.'/data/saskaitos/'.$_SESSION['userId'].'.json'), true);

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $_SESSION['login'] = 'neprijungtas';
//     $_SESSION['userId'] = $user[''];
//     $_SESSION['firstName'] = $user[''];
//     $_SESSION['lastName'] = $user[''];
//     $_SESSION['presonalCode'] = $user[''];
//     $_SESSION['phone'] = $user[''];
//     $_SESSION['email'] = $user[''];
//     $_SESSION['bankoSaskaita'] = $user[''];
//     $_SESSION[''] = $user[''];
//     header('Location: http://localhost/php/bank/index.php');
//     die;
// }

 
$saskaituSuma = 0;
foreach ($saskaitosSukurimas as $saskaita) { 
    $saskaituSuma += $saskaita['saskaitosLikutis'];
}

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
                    <p style="font-size: 2rem;">
                        <?= number_format($saskaituSuma / 100, 2) ?> eur</p>
                </div>
                <a href="mekejimas.php"></a>
                <button type="submit" class="naujasMjolejimas">Naujas mokėjimas</button>
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
                    <?php foreach ($saskaitosSukurimas as $saskaita): ?>
                    <tr>
                        <td>
                            <div style="white-space: normal; text-align: left;">
                                <span><?= $_SESSION['lastName'].' '.$_SESSION['firstName'] ?> Banko sąskaita</span>
                                <span><?= $saskaita['saskaita'] ?></span>
                            </div>
                        </td>
                        <td><?= number_format($saskaita['saskaitosLikutis'] / 100, 2) ?></td>
                        <td><?= number_format($saskaita['rezervuota'] / 100, 2) ?></td>
                        <td><?= number_format($saskaita['disponuojamasLikutis'] / 100, 2) ?></td>
                        <td><?= $saskaita['valiuta'] ?></td>
                    </tr>
                    <?php endforeach ?>
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