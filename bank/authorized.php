<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] !== 'prijungtas') {
    header('Location: ./login.php');
    $_SESSION['error'] = 'Jums reikia prisijungti.';
}
$sukurtosSaskaitos = json_decode(file_get_contents(__DIR__.'/data/saskaitos.json'), true);

$saskaituSuma = 0;
foreach ($sukurtosSaskaitos as $saskaita) { 
    if ($saskaita['userId'] == $_SESSION['userId']) {
        $saskaituSuma += $saskaita['saskaitosLikutis'];
    }
}

if (isset($_SESSION['error'])) {
    $error  = $_SESSION['error'];
    unset($_SESSION['error']);
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
        <h1>Celicija Bankas</h1>
        <?php if (isset($error)): ?>
            <h2 style="color: red;"><?= $error ?></h2>
        <?php endif ?>
        <div style="display: flex; gap: 0.5rem;">
            <div><?= $_SESSION['firstName'].' '.$_SESSION['lastName'] ?></div>
            <?php if ($_SESSION['user'] == 'adminass'): ?>
            <form class="meliuList" action="admin.php" method="post">
                <button class="logout naujasMokejimas" type="submit">Administratorius</button>
            </form>
            <?php endif ?>
            <form class="meliuList" action="logout.php" method="post">
                <button class="logout naujasMokejimas" type="submit">Atsijungti</button>
            </form>
        </div>
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
                <!-- <form action="mekejimas.php" method="post">
                    <button type="submit" class="naujasMokejimas">Naujas mokėjimas</button>
                </form> -->
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Banko sąskaita</th>
                        <th>Sąskaitos likutis</th>
                        <!-- <th>Rezervuota</th> -->
                        <!-- <th>Disponuojamas likutis</th> -->
                        <th>Valiuta</th>
                        <th>Pavedimas</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($sukurtosSaskaitos as $saskaita): ?>
                    <?php if ($saskaita['userId'] == $_SESSION['userId'] && $saskaita['delete'] == false): ?>
                    <tr>
                        <td>
                            <div style="white-space: normal; text-align: left;">
                                <span><b><?= $_SESSION['lastName'].' '.$_SESSION['firstName'] ?> Banko sąskaita</b></span>
                                <span><?= $saskaita['saskaita'] ?></span>
                            </div>
                        </td>
                        <td><?= number_format($saskaita['saskaitosLikutis'] / 100, 2) ?></td>
                        <!-- <td><?= number_format($saskaita['rezervuota'] / 100, 2) ?></td> -->
                        <!-- <td><?= number_format($saskaita['disponuojamasLikutis'] / 100, 2) ?></td> -->
                        <td><?= $saskaita['valiuta'] ?></td>
                        <td>
                            <form action="./mekejimas.php" method="get" value="<?= $saskaita['userId'] ?>">
                                <input type="hidden" name="id" value="<?= $saskaita['userId'] ?>">
                                <input type="hidden" name="idSaskaita" value="<?= $saskaita['saskaita'] ?>">
                                <button type="submit" class="naujasMokejimas">Naujas mokėjimas</button>
                            </form>
                        </td>
                    </tr>
                    <?php endif ?>
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