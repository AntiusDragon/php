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
    ORDER BY type ASC, height DESC -- rusiavimas (DESC // i presinga puse), (ASC // pagal abecele)
    -- LIMIT 0, 3 -- 0 praleis nedaugiau kaip 3 atvaizduos
";

$stmt = $pdo->query($sql);

$trees = $stmt->fetchAll();

// echo '<pre>';
// print_r($trees);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maria Crud Trees</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 1rem;
            text-align: left;
            border-top: 1px solid #ddd;
        }
        tr:hover {
            background-color: #999;
        }
        th {
            background-color: #0b0;
            color: #fff;
        }
    </style>
</head>

<body>
    <h1>Trees</h1>
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
    
</body>
</html>