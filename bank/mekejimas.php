<?php
session_start();
$bankoSaskaitosSukurimas = file_get_contents(__DIR__.'/data/saskaitos.json');



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
            <form action="./saskaitosPavedimas.php" method="post">
                <!-- <p>Gavejo Vardas</p>
                <input type="test" name="firstName" placeholder="First Name">
                <p>Gavejo Pavardė</p>
                <input type="text" name="lastName" placeholder="Last Name"> -->
                <p>Gavėjo Saskaita</p>
                <input type="text" name="klientoSaskaita" placeholder="Gavėjo Saskaita">
                <p>Suma Eur</p>
                <input type="number" name="sumaEur" placeholder="Suma Eur" step="0.01">
                <input type="hidden" name="saskaitosNr" value="<?= $_GET['idSaskaita'] ?>">
                <button class="naujasMokejimas" type="submit">Siusti</button>
            </form>
            <form action="./authorized.php">
                <button class="naujasMokejimas" type="submit">Atgal</button>
            </form>
            <?php 
                // echo $_GET['idSaskaita'] 
            ?>
        </div>
    </main>

</body>
</html>