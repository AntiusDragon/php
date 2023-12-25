<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users = file_get_contents(__DIR__.'/data/users.ser');
    $users = unserialize($users);
    foreach ($users as $user) {
        if ($user['email'] == $_POST['email']) {
            if ($user['password'] == sha1($_POST['password'])) {
                $_SESSION['login'] = 'prijungtas';
                $_SESSION['firstName'] = $user['firstName'];
                $_SESSION['lastName'] = $user['lastName'];
                $_SESSION['presonalCode'] = $user['presonalCode'];
                $_SESSION['phone'] = $user['phone'];
                $_SESSION['email'] = $user['email'];
                $_SESSION[''] = $user[''];
                header('Location: http://localhost/php/bank/authorized.php');
                die;
            }
        }
    }
    $_SESSION['error'] = 'Wrong email or password';
    header('Location: http://localhost/php/bank/login.php');
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
    <title>Login</title>
    <link rel="stylesheet" href="./css/styleLoginRegister.css">
</head>
<body>
    <main class="main">
        <h1>Login</h1>

        <?php if (isset($error)): ?>
            <h1 style="color: red;"><?= $error ?></h1>
        <?php endif ?>

        <form action="" method="post" class="formaLoginRegister">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
        <a class="backMeniu" href="index.php">Go to Meniu</a>
        <a class="backMeniu" href="register.php">I don't have an account</a>
    </main>
</body>
</html>