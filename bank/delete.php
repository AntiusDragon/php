<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minus</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/styleAuthorized.css">
    <style>
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    <main>
        <h1>Tirnti sąskaita</h1>
        <div>
            <a href="./admin.php">Atšaukti</a>
            <form action="./saskaitaDelete.php" method="post">
                <input type="hidden" name="saskaitosNr" value="<?= $_GET['idSaskaita'] ?>">
                <button type="submit">Trinti sąskaitą</button>
            </form>
            <form action="./saskaitaCancelDelete.php" method="post">
                <input type="hidden" name="saskaitosNr" value="<?= $_GET['idSaskaita'] ?>">
                <button type="submit">Atkurti sąskaitą</button>
            </form>
            <form action="./klientaDelete.php" method="post">
                <input type="hidden" name="saskaitosNr" value="<?= $_GET['idSaskaita'] ?>">
                <button type="submit">Trinti klientą</button>
            </form>
            <form action="./klientaDelete.php" method="post">
                <input type="hidden" name="saskaitosNr" value="<?= $_GET['idSaskaita'] ?>">
                <button type="submit">Atkurti klientą</button>
            </form>
            <?php 
                // echo $_GET['idSaskaita'] 
                ?>
        </div>
    </main>
</body>
</html>