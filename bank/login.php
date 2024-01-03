<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users = json_decode(file_get_contents(__DIR__.'/data/users.json'), true);
    // $users = file_get_contents(__DIR__.'/data/users.ser');
    // $users = unserialize($users);
    foreach ($users as $user) {
        if ($user['email'] == $_POST['email']) {
            if ($user['password'] == sha1($_POST['password'])) {
                $_SESSION['login'] = 'prijungtas';
                $_SESSION['userId'] = $user['userId'];
                $_SESSION['firstName'] = $user['firstName'];
                $_SESSION['lastName'] = $user['lastName'];
                $_SESSION['presonalCode'] = $user['presonalCode'];
                $_SESSION['phone'] = $user['phone'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['user'] = $user['user'];
                if ($user['user'] == 'user') {
                    header('Location: ./authorized.php');
                    exit;
                } else {
                    if ($user['user'] == 'adminass') {
                        header('Location: ./admin.php');
                        exit;
                    }
                    header('Location: ./authorized.php');
                    exit;
                }
            }
        }
    }
    $_SESSION['error'] = 'Netinkamas El. pašto adresas arba Slaptažodis.';
    header('Location: ./login.php');
    die;
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
    <title>Prisijungti</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main class="main">
        <h1>Prisijungti</h1>

        <?php if (isset($error)): ?>
            <h1 style="color: red;"><?= $error ?></h1>
        <?php endif ?>

        <form action="" method="post" class="formaLoginRegister">
            <input type="text" name="email" placeholder="El. paštas">
            <input type="password" name="password" placeholder="Slaptažodis">
            <button type="submit">Prisijungti</button>
        </form>
        <a class="backMeniu" href="index.php">Grįžti į pagrindinį puslapį</a>
        <a class="backMeniu" href="register.php">Neturiu paskyros</a>
    </main>
</body>
</html>