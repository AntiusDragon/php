<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] !== 'prijungtas' || $_SESSION['user'] !== 'adminass') {
    header('Location: ./login.php');
    $_SESSION['error'] = 'Jums reikia prisijungti.';
}

$sukurtosSaskaitos = json_decode(file_get_contents(__DIR__.'/data/saskaitos.json'), true);
 
$saskaituSuma = 0;
foreach ($sukurtosSaskaitos as $saskaita) { 
    $saskaituSuma += $saskaita['saskaitosLikutis'];
}

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administratorius</title>
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
            <form class="meliuList" action="authorized.php" method="post">
                <button class="logout naujasMokejimas" type="submit">Naudotojas</button>
            </form>
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
            <table>
                <thead>
                    <tr>
                        <th>Banko sąskaita</th>
                        <th>Sąskaitos likutis</th>
                        <th>Valiuta</th>
                        <th></th>
                        <!-- <th></th> -->
                    </tr>
                </thead>
                
                <tbody>
                    <?php foreach ($sukurtosSaskaitos as $saskaita): ?>
                    <tr>
                        <td>
                            <div style="white-space: normal; text-align: left; color: <?= $saskaita['delete'] == true ? 'red'  : 'black' ?>;">
                                <?php $vartotojai = json_decode(file_get_contents(__DIR__ . '/data/users.json'), true);
                                // <?php $vartotojai = file_get_contents(__DIR__ . '/data/users.ser');
                                        // $vartotojai = unserialize($vartotojai);
                                        foreach ($vartotojai as $vartotojas): ?>
                                <?php if ($vartotojas['userId'] == $saskaita['userId']): ?>
                                    <span><b><?= $vartotojas['lastName'].' '.$vartotojas['firstName'] ?> Banko sąskaita</b>
                                </span>
                                <?php endif ?>
                                <?php endforeach ?>
                                <span><?= $saskaita['saskaita'] ?></span>
                            </div>
                        </td>
                        <td><?= number_format($saskaita['saskaitosLikutis'] / 100, 2) ?></td>
                        <td><?= $saskaita['valiuta'] ?></td>
                        <td>
                            <form action="./minusSum.php" method="get">
                                <input type="hidden" name="id" value="<?= $saskaita['userId'] ?>">
                                <input type="hidden" name="idSaskaita" value="<?= $saskaita['saskaita'] ?>">
                                <button class="naujasMokejimas" type="submit">Sumažinti sąskaitos sumą</button>
                            </form>
                        </td>
                        <td>
                            <form action="./pliusSum.php" method="get">
                                <input type="hidden" name="id" value="<?= $saskaita['userId'] ?>">
                                <input type="hidden" name="idSaskaita" value="<?= $saskaita['saskaita'] ?>">
                                <button class="naujasMokejimas" type="submit">Padidinti sąskaitos sumą</button>
                            </form>
                        </td>
                        <td>
                            <form action="./delete.php" method="get">
                                <input type="hidden" name="id" value="<?= $saskaita['userId'] ?>">
                                <input type="hidden" name="idSaskaita" value="<?= $saskaita['saskaita'] ?>">
                                <button class="naujasMokejimas" type="submit">Sąskaitos Nustatimai</button>
                            </form>
                        </td>
                        <!-- <td><?= number_format($saskaita['disponuojamasLikutis'] / 100, 2) ?></td> -->
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>