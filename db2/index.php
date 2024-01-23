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

$type = $_GET['type'] ?? 'inner';
$h1 = match ($type) {
    'inner' => 'INNER JOIN',
    'left' => 'LEFT JOIN',
    'right' => 'RIGHT JOIN',
};

if ('inner' == $type) {

// SELECT column_name(s)
// FROM table1
// INNER JOIN table2
// ON table1.column_name = table2.column_name;

$sql = "
    SELECT c.id, p.id AS pid, name, number, client_id -- selektina viska is visu lenteliu
    FROM clients AS C
    INNER JOIN phones AS p
    ON c.id = p.client_id -- padarom, kad sytaptu kientu ID su telefono kliento ID
";
}

if ('left' == $type) {

    // SELECT column_name(s)
    // FROM table1
    // LEFT JOIN table2
    // ON table1.column_name = table2.column_name;

    $sql = "
        SELECT c.id, p.id AS pid, name, number, client_id
        FROM clients AS C
        LEFT JOIN phones AS p
        ON c.id = p.client_id
    ";
}

if ('right' == $type) {

    // SELECT column_name(s)
    // FROM table1
    // RIGHT JOIN table2
    // ON table1.column_name = table2.column_name;

    $sql = "
        SELECT c.id, p.id AS pid, name, number, client_id
        FROM clients AS C
        RIGHT JOIN phones AS p
        ON c.id = p.client_id
    ";
}

$stmt = $pdo->query($sql);

$tableData = $stmt->fetchAll();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maria JOIN</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1><?= $h1 ?></h1>
    <h2>TreClients and Phoneses</h2>
    <table>
        <thead>
            <tr>
                <th>Client Id</th>
                <th>Name</th>
                <th>Phone Id</th>
                <th>Phone</th>
                <th>Phone Client Id</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($tableData as $data) : ?>
                <tr>
                    <?php 
                        $listItem = [
                            'id',
                            'name',
                            'pid',
                            'number',
                            'client_id'
                        ];
                        foreach ($listItem as $items) {
                            echo '<td>'.$data[$items].'</td>';
                        }
                    ?>
                    <!-- <td><?= $data['id']; ?></td> -->
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <div class="forms">
        <?php 
        $joinLists = [
            [
                'lower' => "inner",
                'upper' => 'INNER'
            ],
            [
                'lower' => "left",
                'upper' => 'LEFT'
            ],
            [
                'lower' => "right",
                'upper' => 'RIGHT'
            ]
            ];
            foreach ($joinLists as $joinList): 
        ?>
        <form>
            <h2><?= $joinList['upper'] ?> JOIN</h2>
            <input type="hidden" name="type" value="<?= $joinList['lower'] ?>">
            <button type="submit"><?= $joinList['upper'] ?></button>
        </form>
        <?php endforeach ?>
    </div>
    
</body>
</html>