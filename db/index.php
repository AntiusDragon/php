<?php

$host = '127.0.0.1';
$db   = 'forest';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);

// SELECT column1, column2, ...
// FROM table_name;

$sql = "
    SELECT id, name, height, type
    FROM trees
    -- WHERE type <> 'lapuotis' AND height > 0 -- '=' atvaizduoja tik lapuotis, '<>' atvirksciai OR kai norin kaudoti 2 kartu papari typa
    -- ORDER BY type ASC, height DESC -- rusiavimas (DESC // i presinga puse), (ASC // pagal abecele)
    -- LIMIT 0, 3 -- 0 praleis nedaugiau kaip 3 atvaizduos
";

$stmt = $pdo->query($sql);

$trees = $stmt->fetchAll();

// SELECT AVG(Price)
// FROM Products;

$sql = "
    SELECT AVG(height) AS average, COUNT(*) AS count
    FROM trees
";
$stmt = $pdo->query($sql);

$stat = $stmt->fetch();

// $average => $stat pakeiciam jei yra daugiau

// echo '<pre>';
// print_r($trees);
// print_r($average);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maria Crud Trees</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Trees</h1>
    <h2>Avarage height: <?= $stat['average'] ?> m.</h2>
    <h2>Total trees: <?= $stat['count'] ?> vnt.</h2>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Height</th>
                <th>Type</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($trees as $tree) : ?>
                <tr>
                    <?php 
                        $listItem = [
                            'id',
                            'name',
                            'height',
                            'type'
                        ];
                        foreach ($listItem as $items) {
                            echo '<td>'.$tree[$items].'</td>';
                        }
                    ?>
                    <!-- <td><?= $tree['id']; ?></td> -->
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <div class="forms">
        <form action="store.php" method="post">
            <h2>Plant a tree</h2>
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="height" placeholder="Height">
            <select name="type">
                <option value="0">Pasirinkti</option>
                <option value="lapuotis">Lapuotis</option>
                <option value="spygliuotis">Spygliuotis</option>
                <option value="palme">Palmė</option>
            </select>
            <button type="submit">Plant Tree</button>
        </form>

        <form action="destroy.php" method="post">
            <h2>Cut a tree</h2>
            <input type="text" name="id" placeholder="Id">
            <button type="submit">Cut Tree</button>
        </form>

        <form action="update.php" method="post">
            <h2>Grow a tree</h2>
            <input type="text" name="id" placeholder="Id">
            <input type="text" name="height" placeholder="Height">
            <button type="submit">Grow</button>
        </form>
    </div>
    
</body>
</html>