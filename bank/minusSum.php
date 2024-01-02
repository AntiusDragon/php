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
        <h1>Minus</h1>
        <div>
            <a href="./admin.php">Cancel</a>
            <form action="./saskaitosMinusavimas.php" method="post">
                <input type="number" name="saskaitosMin" step="0.01">
                <input type="hidden" name="saskaitosNr" value="<?= $_GET['idSaskaita'] ?>">
                <button type="submit">Atimti</button>
            </form>
            <?php 
                // echo $_GET['idSaskaita'] 
                ?>
        </div>
    </main>
</body>
</html>