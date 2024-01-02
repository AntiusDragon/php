<?php
session_start();
require __DIR__ . '/registracija/presonalCode.php';

if (isset($_SESSION['login']) && $_SESSION['login'] == 'prijungtas') {
    header('Location: ./index.php');
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
    
    if (preg_match('/^[A-Za-z\s]+$/', $_POST['firstName'])) {
        if ($_POST['firstName'] == '' || strlen($_POST['firstName']) < 2 || strlen($_POST['firstName']) > 40 ) {
            $_SESSION['errorFirstName'] = 'error FirstName';
            $_SESSION['old_data'] = $_POST;
            $loginOn = false;
        } 
    } else {
        $_SESSION['errorFirstName'] = "There must be only letters.";
    }

    if (preg_match('/^[A-Za-z\s]+$/', $_POST['lastName'])) {
        if ($_POST['lastName'] == '' || strlen($_POST['lastName']) < 2 || strlen($_POST['lastName']) > 40 ) {
            $_SESSION['errorLastName'] = 'error LastName';
            $_SESSION['old_data'] = $_POST;
            $loginOn = false;
        }
    } else {
        $_SESSION['errorLastName'] = "There must be only letters.";
    }
    if (!validPersonalCode($_POST['presonalCode'])) {
        $_SESSION['errorPresonalCode'] = 'error PresonalCode';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    }
    if ($_POST['email'] == '') {
        $_SESSION['errorEmail'] = 'errorEmail';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    }

    // require __DIR__ . '/registracija/vartotojoTikrinimas.php';
        // tikrinama ar yra toks vartotojas?
        $users = json_decode(file_get_contents(__DIR__.'/data/users.json'), true);
        // $users = unserialize($users);
        foreach ($users as $user) {
            if ($user['email'] == $_POST['email']) {
                $_SESSION['errorEmail'] = 'User with this email already exists';
                $_SESSION['old_data'] = $_POST;
                $loginOn = false;
            }
            if ($user['presonalCode'] == $_POST['presonalCode']) {
                $_SESSION['errorPresonalCode'] = 'Error presonalCode';
                $_SESSION['old_data'] = $_POST;
                $loginOn = false;
            }
            if ($user['phone'] == $_POST['phone']) {
                $_SESSION['errorPhone'] = 'Phone with this exists';
                $_SESSION['old_data'] = $_POST;
                $loginOn = false;
            }
    
            if ($loginOn == false) {
                header('Location: ./register.php');
                die;
            }
        }
        $sukurtosSaskaitos = json_decode(file_get_contents(__DIR__ . '/data/saskaitos.json'), true);
        // $sukurtosSaskaitos = json_decode($sukurtosSaskaitos, true); // Konvertuojame eilutę į masyvą
        // require __DIR__ . '/registracija/registerChecking.php';
        $bankoSaskaita1 = '';
        $bankoSaskaita2 = '';
        $bankoSaskaita3 = '';
        $bankoSaskaita4 = '';
        $bankoSaskaita5 = '';
        $bankoSaskaita11 = 1;
        for ($i=0; $i < $bankoSaskaita11; $i++) { 
            // $bankoSaskaita6 = rand(10, 99);
            // $bankoSaskaita7 = rand(1000, 9999);
            // $bankoSaskaita8 = rand(1000, 9999);
            $bankoSaskaita9 = rand(1000, 9999);
            $bankoSaskaita10 = rand(1000, 9999);
            foreach ($sukurtosSaskaitos as $sukurtaSaskaita) {
                $bankoSaskaita1 = $bankoSaskaita6;
                $bankoSaskaita2 = $bankoSaskaita7;
                $bankoSaskaita3 = $bankoSaskaita8;
                $bankoSaskaita4 = $bankoSaskaita9;
                $bankoSaskaita5 = $bankoSaskaita10;
                if ("LT242024$bankoSaskaita3$bankoSaskaita4$bankoSaskaita5" == $sukurtaSaskaita['saskaita']) {
                    $bankoSaskaita11 = $i + 1;
                }
            }
        }
        $userId = '';
        $userIdFor = 1;
        for ($i=0; $i < $userIdFor; $i++) { 
            $userIdRand = rand(100000000, 999999999);
            foreach ($users as $user) {
                $userId = $userIdRand;
                if ($userIdRand == $user['userId']) {
                    $userIdFor = $i + 1;
                }
            }
        }
    
        $user = [
            'userId' => $userId,
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'presonalCode' => $_POST['presonalCode'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'password' => sha1($_POST['password']),
            'user' => 'user',
        ];
        $users[] = $user;
        file_put_contents(__DIR__.'/data/users.json', json_encode($users, JSON_PRETTY_PRINT));
        // file_put_contents(__DIR__.'/data/users.ser', serialize($users));
        $sukurtaSaskaita = [
                'userId' => $userId,
                'saskaita' => "LT242024$bankoSaskaita3$bankoSaskaita4$bankoSaskaita5",
                'saskaitosLikutis' => 1000,
                'rezervuota' => 0,
                'disponuojamasLikutis' => 0,
                'valiuta' => 'Eur',
        ];
        $sukurtosSaskaitos[] = $sukurtaSaskaita;
        file_put_contents(__DIR__."/data/saskaitos.json", json_encode($sukurtosSaskaitos, JSON_PRETTY_PRINT));
        echo "seeder started\n";
    //     $bankoSaskaitosSukurimas = [
    //         [
    //         'bankoSaskaita' => "LT$bankoSaskaita1 7044 0600 0772 $bankoSaskaita2",
    //         ],
    //    ];
       file_put_contents(__DIR__.'/data/users.json', json_encode($users, JSON_PRETTY_PRINT));
    //    file_put_contents(__DIR__.'/data/users.json', serialize($users));
       echo "seeder finished\n";
        header('Location: ./login.php');
        die;
    }
// Atciranda error pranešimas
$errorFields = ['error', 'errorFirstName', 'errorLastName', 'errorPresonalCode', 'errorPhone', 'errorEmail', 'errorPassword'];
foreach ($errorFields as $field) {
    if (isset($_SESSION[$field])) {
        ${$field} = $_SESSION[$field];
        unset($_SESSION[$field]);
    }
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
            <?php
                // $newAccInfoList = ['firstName', 'lastName', 'presonalCode', 'phone', 'email', 'password', 'password2'];
                $newAccInfoList = [
                    [
                        'firstName',
                        'errorFirstName',
                        'first Name',
                    ],
                    [
                        'lastName',
                        'errorLastName',
                        'last Name',
                    ],
                    [
                        'presonalCode',
                        'errorPresonalCode',
                        'Presonal Code',
                    ],
                    [
                        'phone',
                        'errorPhone',
                        'Phone',
                    ],
                    [
                        'email',
                        'errorEmail',
                        'Email',
                    ],
                    [
                        'password',
                        'errorPassword',
                        'Password',
                    ],
                    [
                        'password2',
                        'errorPassword',
                        'Repeat Password',
                    ]
                ];
                foreach ($newAccInfoList as $newAccInfo):
            ?>

                <!-- <input type="text" name="<?= $newAccInfo[0] ?>" placeholder="<?= $newAccInfo[2] ?>"
                    value="<?= isset($old_data[$newAccInfo[0]]) ? $old_data[$newAccInfo[0]] : '' ?>">
                <?php if (isset(${$newAccInfo[1]})): ?>
                <p style="color: red;"><?= ${$newAccInfo[1]} ?></p>
                <?php endif ?> -->

            <?php endforeach ?>

            <input type="text" name="firstName" placeholder="First Name"
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