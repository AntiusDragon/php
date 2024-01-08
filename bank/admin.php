<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] !== 'prijungtas' || $_SESSION['user'] !== 'adminass') {
    header('Location: ./login.php');
    $_SESSION['error'] = 'Jums reikia prisijungti.';
}

$sukurtosSaskaitos = json_decode(file_get_contents(__DIR__.'/data/saskaitos.json'), true);
$vartotojai = json_decode(file_get_contents(__DIR__ . '/data/users.json'), true);
 
$saskaituSuma = 0;
foreach ($sukurtosSaskaitos as $saskaita) { 
    $saskaituSuma += $saskaita['saskaitosLikutis'];
}

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

if (isset($_SESSION['allOk'])) {
    $allOk = $_SESSION['allOk'];
    unset($_SESSION['allOk']);
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
        <?php if (isset($allOk)): ?>
        <h2 style="color: green;"><?= $allOk ?></h2>
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
            <form action="" method="get">
                <div>
                    <form action="./admin.php" method="get">
                        <div>
                            <label for="userId">Rūšiuoti pagal</label>
                            <select class="form-select" name="sort">
                                <option value="default" <?= ($_GET['sort'] ?? '') == 'default' ? 'selected' : '' ?>>Default</option>
                                <option value="userId_asc" <?= ($_GET['sort'] ?? '') == 'userId_asc' ? 'selected' : '' ?> >Vartotojo ID 1-9</option>
                                <option value="userId_desc" <?= ($_GET['sort'] ?? '') == 'userId_desc' ? 'selected' : '' ?> >Vartotojo ID 9-1</option>
                                <option value="id_asc" <?= ($_GET['sort'] ?? '') == 'id_asc' ? 'selected' : '' ?>>Sąskaitoslikutis 1-9</option>
                                <option value="id_desc" <?= ($_GET['sort'] ?? '') == 'id_desc' ? 'selected' : '' ?>>Sąskaitos likutis 9-1</option>
                            </select>
                        </div>
                        <button type="submit" >Rūšiuoti</button>
                        <a href="./admin.php">Išvalyti</a>
                </form>
                </div>
            </form>
        </div>
        <div class="pagrindinisLaukas" style="overflow-y: auto;">
            <table>
                <thead>
                    <tr>
                        <th>Vartotojo ID</th>
                        <th>Banko sąskaita</th>
                        <th>Sąskaitos likutis</th>
                        <th>Valiuta</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody class="tbody">
                    <?php
                        if (isset($_GET['sort'])) {
                            match($_GET['sort']) {
                                'userId_asc' => usort($sukurtosSaskaitos, fn($a, $b) => $a['userId'] <=> $b['userId']),
                                'userId_desc' => usort($sukurtosSaskaitos, fn($a, $b) => $b['userId'] <=> $a['userId']),
                                'id_asc' => usort($sukurtosSaskaitos, fn($a, $b) => $a['saskaitosLikutis'] <=> $b['saskaitosLikutis']),
                                'id_desc' => usort($sukurtosSaskaitos, fn($a, $b) => $b['saskaitosLikutis'] <=> $a['saskaitosLikutis']),
                                default => $sukurtosSaskaitos,
                            };
                        }
                    ?>
                    <?php foreach ($sukurtosSaskaitos as $saskaita): ?>
                    <tr>
                        <?php foreach ($vartotojai as $vartotojas): ?>
                        <?php if ($vartotojas['userId'] == $saskaita['userId']): ?>
                        <td>
                            <div style="white-space: normal; text-align: left; color: <?= $saskaita['delete'] == true ? 'red'  : 'black' ?>;">
                                <span><b><?= $vartotojas['userId']?></b></span>
                            </div>
                        </td>
                        <td>
                            <div style="white-space: normal; text-align: left; color: <?= $saskaita['delete'] == true ? 'red'  : 'black' ?>;">
                                <span><b><?= $vartotojas['lastName'].' '.$vartotojas['firstName'] ?> Banko sąskaita</b></span>
                                <span><?= $saskaita['saskaita'] ?></span>
                            </div>
                        </td>
                        <?php endif ?>
                        <?php endforeach ?>
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