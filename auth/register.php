<?php
    session_start();
    if (isset($_SESSION['login']) && $_SESSION['login'] == 'sitas yra prisilogines') {
        header('Location: http://localhost/php/auth/index.php');
        die;
    } // jei esu prisilogines, neleidzia eiti i login puslapi

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['password'] != $_POST['password2']) {
            $_SESSION['error'] = 'Passwords do not match';
            $_SESSION['old_data'] = $_POST;
            header('location: http://localhost/php/auth/register.php');
            die;
        }
        $users = file_get_contents(__DIR__.'/data/users.ser');
        $users = unserialize($users);
        // check user existence
        foreach ($users as $user);
            if ($user['email'] == $_POST['email']) {
                $_SESSION['error'] = 'User with this email already exists';
                $_SESSION['old_data'] = $_POST;
                header('location: http://localhost/php/auth/register.php');
                die;
            }

        $user = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => sha1($_POST['password']),
        ];
        $users[] = $user;
        file_put_contents(__DIR__.'/data/users.ser', serialize($users));
        header('Location: http://localhost/php/auth/login.php');
        die;
    }

    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }

    if (isset($_SESSION['old_data'])) {
        $old_data = $_SESSION['old_data'];
        unset($_SESSION['old_data']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register to Fores</title>
</head>
<body style="background-color: #000; color: #0b0">

    <h1>Register to Fores</h1>

    <?php if (isset($error)): ?>
        <h1 style="color: red;"><?= $error ?></h1>
    <?php endif ?>

    <form action="" method="post">
        <input type="text" name="name" placeholder="Name" value="<?= isset($old_data['name']) ? $old_data['name'] : '' ?>">
        <input type="text" name="email" placeholder="Email" value="<?= isset($old_data['email']) ? $old_data['email'] : '' ?>">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password2" placeholder="Repeat Password">
        <button type="submit">Register</button>
    </form>
    
    
</body>
</html>