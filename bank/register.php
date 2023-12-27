<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == 'prijungtas') {
    header('Location: http://localhost/php/bank/index.php');
    die;
} // jei esu prisilogines, neleidzia eiti i login puslapi

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loginOn = true;
    if ($_POST['password'] == '') {
        $_SESSION['errorPassword'] = 'Passwords error';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    } else if (!(5 < strlen($_POST['password']) && strlen($_POST['password']) < 41)) {
        $_SESSION['errorPassword'] = 'Passwords simbol min 6, max 41';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    } else if ($_POST['password'] != $_POST['password2']) {
        $_SESSION['errorPassword'] = 'Passwords do not match';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    }
    if (substr($_POST['phone'], 0, 4) !== '+370') {
        $_SESSION['errorPhone'] = 'Invalid phone number format "+370"';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    } else {
        if (strlen($_POST['phone']) !== 12) {
            $_SESSION['errorPhone'] = 'Invalid phone number format';
            $_SESSION['old_data'] = $_POST;
            $loginOn = false;
        }
    }
    if ($_POST['firstName'] == '' || strlen($_POST['firstName']) < 2 || strlen($_POST['firstName']) > 40 ) {
        $_SESSION['errorFirstName'] = 'errorFirstName';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    } 
    if ($_POST['lastName'] == '' || strlen($_POST['lastName']) < 2 || strlen($_POST['lastName']) > 40 ) {
        $_SESSION['errorLastName'] = 'errorLastName';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    } 
    if ($_POST['presonalCode'] == '' || strlen($_POST['presonalCode']) !== 11 ) {
        $_SESSION['errorPresonalCode'] = 'errorPresonalCode';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    } 
    if ($_POST['email'] == '') {
        $_SESSION['errorEmail'] = 'errorEmail';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    } 
    // tikrinama ar yra toks vartotojas?
    $users = file_get_contents(__DIR__.'/data/users.ser');
    $users = unserialize($users);
    foreach ($users as $user) {
        if ($user['email'] == $_POST['email']) {
            $_SESSION['errorEmail'] = 'User with this email already exists';
            $_SESSION['old_data'] = $_POST;
        }
        if ($user['presonalCode'] == $_POST['presonalCode']) {
            $_SESSION['errorPresonalCode'] = 'Error presonalCode';
            $_SESSION['old_data'] = $_POST;
        }
        if ($user['phone'] == $_POST['phone']) {
            $_SESSION['errorPhone'] = 'Phone with this exists';
            $_SESSION['old_data'] = $_POST;
        }

        if ($loginOn == false) {
            header('Location: http://localhost/php/bank/register.php');
            die;
        }
        $bankoSaskaita1 = '';
        $bankoSaskaita2 = '';
        $bankoSaskaita5 = 9999;
        for ($i=0; $i < $bankoSaskaita5; $i++) { 
            $bankoSaskaita3 = rand(10, 99);
            $bankoSaskaita4 = rand(1000, 9999);
            $bankoSaskaita5 = $i;
            foreach ($users as $user) {
                $bankoSaskaita1 = $bankoSaskaita3;
                $bankoSaskaita2 = $bankoSaskaita4;
                if ("LT$bankoSaskaita3 7044 0600 0772 $bankoSaskaita4" == $user['bankoSaskaita']) {
                    $bankoSaskaita5 = 9999;
                }
            }
        }

        $user = [
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'presonalCode' => $_POST['presonalCode'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'password' => sha1($_POST['password']),
            'bankoSaskaita' => "LT$bankoSaskaita1 7044 0600 0772 $bankoSaskaita2",
        ];
        $users[] = $user;
        file_put_contents(__DIR__.'/data/users.ser', serialize($users));
        file_put_contents("./data/saskaitos/LT$bankoSaskaita1 7044 0600 0772 $bankoSaskaita2.txt", '1000');
        echo "seeder started\n";
        $bankoSaskaitosSukurimas = [
            [
            'bankoSaskaita' => "LT$bankoSaskaita1 7044 0600 0772 $bankoSaskaita2",
            ],
       ];
       file_put_contents(__DIR__.'/data/users.ser', serialize($users));
       echo "seeder finished\n";
        header('Location: http://localhost/php/bank/login.php');
        die;
    }
}

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
if (isset($_SESSION['errorFirstName'])) {
    $errorFirstName = $_SESSION['errorFirstName'];
    unset($_SESSION['errorFirstName']);
}
if (isset($_SESSION['errorLastName'])) {
    $errorLastName = $_SESSION['errorLastName'];
    unset($_SESSION['errorLastName']);
}
if (isset($_SESSION['errorPresonalCode'])) {
    $errorPresonalCode = $_SESSION['errorPresonalCode'];
    unset($_SESSION['errorPresonalCode']);
}
if (isset($_SESSION['errorPhone'])) {
    $errorPhone = $_SESSION['errorPhone'];
    unset($_SESSION['errorPhone']);
}
if (isset($_SESSION['errorEmail'])) {
    $errorEmail = $_SESSION['errorEmail'];
    unset($_SESSION['errorEmail']);
}
if (isset($_SESSION['errorPassword'])) {
    $errorPassword = $_SESSION['errorPassword'];
    unset($_SESSION['errorPassword']);
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
    <title>Register</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main class="main">
        <h1>Register to Fores</h1>

        <?php if (isset($error)): ?>
            <h2 style="color: red;"><?= $error ?></h2>
            <?php endif ?>
            
            <form action="" method="post" class="formaLoginRegister">
            <input type="text" name="firstName" placeholder="First name" 
                value="<?= isset($old_data['firstName']) ? $old_data['firstName'] : '' ?>">
                <?php if (isset($errorFirstName)): ?>
                    <p style="color: red;"><?= $errorFirstName ?></p>
                <?php endif ?>
            <input type="text" name="lastName" placeholder="Last Name" 
                value="<?= isset($old_data['lastName']) ? $old_data['lastName'] : '' ?>">
                <?php if (isset($errorLastName)): ?>
                    <p style="color: red;"><?= $errorLastName ?></p>
                <?php endif ?>
            <input type="test" name="presonalCode" placeholder="Personal Code">
                <?php if (isset($errorPresonalCode)): ?>
                    <p style="color: red;"><?= $errorPresonalCode ?></p>
                <?php endif ?>
            <input type="phone" name="phone" placeholder="Phone" 
                value="<?= isset($old_data['phone']) ? $old_data['phone'] : '' ?>">
                <?php if (isset($errorPhone)): ?>
                    <p style="color: red;"><?= $errorPhone ?></p>
                <?php endif ?>
            <input type="text" name="email" placeholder="Email" 
                value="<?= isset($old_data['email']) ? $old_data['email'] : '' ?>">
                <?php if (isset($errorEmail)): ?>
                    <p style="color: red;"><?= $errorEmail ?></p>
                <?php endif ?>
            <input type="password" name="password" placeholder="Password">
                <?php if (isset($errorPassword)): ?>
                    <p style="color: red;"><?= $errorPassword ?></p>
                <?php endif ?>
            <input type="password" name="password2" placeholder="Repeat Password">
                <?php if (isset($errorPassword)): ?>
                    <p style="color: red;"><?= $errorPassword ?></p>
                <?php endif ?>
            <button type="submit">Register</button>

        </form>
        <a class="backMeniu" href="index.php">Go to Meniu</a>
        <a class="backMeniu" href="login.php">I have an account</a>
    </main>
</body>
</html>